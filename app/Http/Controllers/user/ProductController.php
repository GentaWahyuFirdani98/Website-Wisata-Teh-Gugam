<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KatalogProduk;
use App\Models\Produk;

class ProductController extends Controller
{
    public function index()
    {
        $produks = KatalogProduk::all();
        return view('pages.produk', compact('produks'));
    }
}
