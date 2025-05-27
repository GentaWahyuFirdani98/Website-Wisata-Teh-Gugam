<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User; // Pastikan ada use model user di atas



class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('user')->latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function data()
    {
        $artikels = Artikel::with('user')->select('artikels.*');

        return datatables()->of($artikels)
            ->addColumn('action', function($artikel) {
                return '
                    <a href="'.route('admin.artikel.edit', $artikel->id).'" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="'.route('admin.artikel.destroy', $artikel->id).'" method="POST" class="inline" onsubmit="return confirm(\'Yakin hapus artikel?\')">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';
            })
            ->editColumn('tanggal_publikasi', function($artikel) {
                return $artikel->tanggal_publikasi->format('d M Y');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $data = $request->except('foto');
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = auth()->id();
        $data['tanggal_publikasi'] = now();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($artikel->foto) {
                Storage::disk('public')->delete($artikel->foto);
            }
            $data['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->foto) {
            Storage::disk('public')->delete($artikel->foto);
        }
        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }


}