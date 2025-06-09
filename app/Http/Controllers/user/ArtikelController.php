<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest('tanggal_publikasi')->paginate(9);
        return view('user.artikel.artikel', compact('artikels')); // ← penting!
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('user.artikel.show', compact('artikel'));
    }

    
}
