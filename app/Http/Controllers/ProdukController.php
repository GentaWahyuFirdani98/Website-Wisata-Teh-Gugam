<?php

namespace App\Http\Controllers;

use App\Models\KatalogProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = KatalogProduk::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $jenisProduk = ['villa', 'kuliner', 'meeting_room', 'camping_ground'];
        return view('admin.produk.create', compact('jenisProduk'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_produk' => 'required|max:255',
    //         'jenis_produk' => 'required|in:villa,kuliner,meeting_room,camping_ground',
    //         'harga' => 'required|numeric|min:0',
    //         'deskripsi' => 'nullable',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $data = $request->except('foto');
    //     $data['slug'] = Str::slug($request->nama_produk);
    //     $data['user_id'] = auth()->id();
    //     $data['foto'] = $request->file('foto')->store('produk', 'public');

    //     KatalogProduk::create($data);

    //     return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama_produk' => 'required|max:255',
    //         'jenis_produk' => 'required|in:villa,kuliner,meeting_room,camping_ground',
    //         'harga' => 'required|numeric|min:0',
    //         'deskripsi' => 'nullable',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     KatalogProduk::create([
    //         'nama_produk' => $validated['nama_produk'],
    //         'slug' => Str::slug($validated['nama_produk']),
    //         'jenis_produk' => $validated['jenis_produk'],
    //         'harga' => $validated['harga'],
    //         'deskripsi' => $validated['deskripsi'],
    //         'foto' => $request->file('foto')->store('produk', 'public'),
    //         'user_id' => auth()->id()
    //     ]);

    //     return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'jenis_produk' => 'required|in:villa,kuliner,meeting_room,camping_ground',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Slug akan otomatis dibuat oleh model
        KatalogProduk::create([
            'nama_produk' => $validated['nama_produk'],
            'jenis_produk' => $validated['jenis_produk'],
            'harga' => $validated['harga'],
            'deskripsi' => $validated['deskripsi'],
            'foto' => $request->file('foto')->store('produk', 'public'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(KatalogProduk $produk)
    {
        $jenisProduk = ['villa', 'kuliner', 'meeting_room', 'camping_ground'];
        return view('admin.produk.edit', compact('produk', 'jenisProduk'));
    }

    public function update(Request $request, KatalogProduk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'jenis_produk' => 'required|in:villa,kuliner,meeting_room,camping_ground',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');
        $data['slug'] = Str::slug($request->nama_produk);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($produk->foto);
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(KatalogProduk $produk)
    {
        Storage::disk('public')->delete($produk->foto);
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}