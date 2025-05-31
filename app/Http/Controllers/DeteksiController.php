<?php

namespace App\Http\Controllers;

use App\Models\DeteksiDaunTeh;
use App\Models\JenisPenyakit;
use Illuminate\Http\Request;

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
            return view('admin.deteksi.index', compact('deteksis'));
        } else {
            $gambar = session('gambar'); // ambil dari session flash
            return view('user.deteksi.deteksi', compact('gambar'));
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

}
