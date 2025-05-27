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
        if(auth()->user()->role == 'admin'){
            $deteksis = DeteksiDaunTeh::with(['user', 'jenisPenyakit'])
                ->latest()
                ->paginate(10);
            return view('admin.deteksi.index', compact('deteksis'));
        } else {
            return view('deteksi');
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
}
