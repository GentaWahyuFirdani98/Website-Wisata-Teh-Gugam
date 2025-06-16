<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Artikel;

class GaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->paginate(20);
        return view('user.galeri.galeri', compact('galeris'));
    }

    public function beranda()
    {
        $galeris = Galeri::latest()->take(3)->get(); 
        $artikels = Artikel::latest('tanggal_publikasi')->take(3)->get(); // Tambahan
        return view('pages.home', compact('galeris', 'artikels')); // Kirim ke view
    }
}
