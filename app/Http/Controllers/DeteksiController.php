<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeteksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('deteksi');
    }

    public function process(Request $request)
    {
        // Logika deteksi penyakit di sini
        return back()->with('success', 'Deteksi berhasil diproses');
    }
}