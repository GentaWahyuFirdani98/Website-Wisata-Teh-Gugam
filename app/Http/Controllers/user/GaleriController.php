<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->paginate(20);
        return view('user.galeri.galeri', compact('galeris'));
    }
    public function beranda()
    {
        $galeris = Galeri::latest()->take(3)->get(); // Ambil 3 galeri terbaru
        return view('pages.home', compact('galeris'));
    }

}

