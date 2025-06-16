<?php

namespace App\Http\Controllers;

use App\Models\DeteksiDaunTeh;
use App\Models\JenisPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DeteksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Untuk User =====
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $deteksis = DeteksiDaunTeh::with(['user', 'jenisPenyakit'])
                ->latest()
                ->paginate(10);

            // Hitung statistik berdasarkan nama penyakit
            $statistik = DeteksiDaunTeh::with('jenisPenyakit')
                ->get()
                ->groupBy(fn($item) => $item->jenisPenyakit->nama_penyakit ?? 'Tidak Diketahui')
                ->map(fn($group) => $group->count());

            return view('admin.deteksi.index', compact('deteksis', 'statistik'));
        } else {
            $gambar = session('gambar');

            $riwayat = DeteksiDaunTeh::with('jenisPenyakit')
                ->where('user_id', auth()->id())
                ->latest()
                ->take(20)
                ->get();

            return view('user.deteksi.deteksi', compact('gambar', 'riwayat'));
        }
    }


    public function process(Request $request)
    {
        // Logika deteksi penyakit di sini
        return back()->with('success', 'Deteksi berhasil diproses');
    }

    public function show(DeteksiDaunTeh $deteksi)
    {
        return view('admin.deteksi.show', compact('deteksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Simpan gambar ke folder storage/app/public/deteksi
        $path = $request->file('gambar')->store('public/deteksi');

        // Ambil nama file
        $filename = basename($path);

        // Redirect ke halaman deteksi + tampilkan nama file
        return view('user.deteksi.index', ['gambar' => $filename]);
    }

    public function uploadFromCamera(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:5120', // 5MB
        ]);
    
        $path = $request->file('gambar')->store('deteksi', 'public');
        $filename = basename($path);
    
        // Redirect ke route deteksi (GET /deteksi), bawa nama gambar via session
        return redirect()->route('deteksi')->with('gambar', $filename);
    }




//     public function submitDeteksi(Request $request)
// {
//     $request->validate([
//         'gambar' => 'required|image|max:5120',
//     ]);

//     // Simpan gambar ke storage
//     $path = $request->file('gambar')->store('deteksi', 'public');
//     $filename = basename($path);

//     // Kirim ke API FastAPI
//     $response = Http::attach('file', file_get_contents($request->file('gambar')), $filename)
//         ->post('http://127.0.0.1:8000/predict');

//     $result = $response->json();

//     // Tentukan jenis penyakit/kualitas
//     $penyakitName = null;
//     if ($result['status'] === 'Sick') {
//         $penyakitName = $result['penyakit'];
//     } elseif ($result['status'] === 'Healthy') {
//         $penyakitName = $result['kualitas'];
//     }

//     $jenis_penyakit_id = null;
//     if ($penyakitName) {
//         $penyakit = JenisPenyakit::where('nama_penyakit', $penyakitName)->first();
//         if ($penyakit) {
//             $jenis_penyakit_id = $penyakit->id;
//         }
//     }

//     // Simpan ke tabel deteksi_daun_tehs
//     DeteksiDaunTeh::create([
//     'user_id' => auth()->id(),
//     'jenis_penyakit_id' => $jenis_penyakit_id,
//     'foto_daun' => $filename,
//     'confidence' => $result['confidence'] ?? null,
//     'tanggal_upload' => Carbon::now(),
//     ]);

// return redirect()->route('deteksi')
//     ->with('gambar', $filename)
//     ->with('result', $result);

// }
public function rekam(Request $request)
{
    $data = $request->validate([
        'status' => 'required|string',
        'kualitas' => 'nullable|string',
        'penyakit' => 'nullable|string',
        'confidence' => 'nullable|numeric',
        'gambar' => 'nullable|string',
    ]);

    // Tentukan nama penyakit atau kualitas yang akan dicari
    $penyakitName = $data['status'] === 'Sick' ? $data['penyakit'] : $data['kualitas'];

    if (!$penyakitName) {
        return response()->json(['error' => 'Nama penyakit atau kualitas tidak ditemukan.'], 422);
    }

    // Cari ID dari jenis_penyakit berdasarkan nama
    $penyakit = JenisPenyakit::whereRaw('LOWER(nama_penyakit) = ?', [strtolower($penyakitName)])->first();

    if (!$penyakit) {
        return response()->json(['error' => 'Jenis penyakit tidak cocok di database.'], 422);
    }

    // Simpan ke tabel deteksi
    DeteksiDaunTeh::create([
        'user_id' => auth()->id(),
        'jenis_penyakit_id' => $penyakit->id,
        'foto_daun' => $data['gambar'],
        'confidence' => $data['confidence'],
        'tanggal_upload' => now()->toDateString(), // karena kolom date
    ]);

    return response()->json(['message' => 'Berhasil disimpan']);
}

public function uploadGambarAjax(Request $request)
{
    $request->validate([
        'gambar' => 'required|image|max:5120',
    ]);

    $path = $request->file('gambar')->store('deteksi', 'public');
    $filename = basename($path);

    return response()->json(['filename' => $filename]);
}


public function destroy($id)
{
    $deteksi = DeteksiDaunTeh::findOrFail($id);

    // Hapus file gambar dari storage
    if ($deteksi->foto_daun && Storage::exists('public/deteksi/' . $deteksi->foto_daun)) {
        Storage::delete('public/deteksi/' . $deteksi->foto_daun);
    }

    $deteksi->delete();

    return redirect()->route('admin.deteksi.index')->with('success', 'Data deteksi berhasil dihapus.');
}

public function destroyAll()
{
    $deteksis = \App\Models\DeteksiDaunTeh::all();

    foreach ($deteksis as $deteksi) {
        if ($deteksi->foto_daun && \Storage::disk('public')->exists('deteksi/' . $deteksi->foto_daun)) {
            \Storage::disk('public')->delete('deteksi/' . $deteksi->foto_daun);
        }
        $deteksi->delete();
    }

    return redirect()->route('admin.deteksi.index')->with('success', 'Semua data deteksi berhasil dihapus.');
}


}
