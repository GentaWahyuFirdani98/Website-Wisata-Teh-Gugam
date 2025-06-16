<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('user')->latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
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

        // Buat slug unik
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter = 1;
        while (Artikel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

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

        // Hanya buat ulang slug jika judul berubah
        if ($request->judul !== $artikel->judul) {
            $slug = Str::slug($request->judul);
            $originalSlug = $slug;
            $counter = 1;
            while (Artikel::where('slug', $slug)->where('id', '!=', $artikel->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('foto')) {
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