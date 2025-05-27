<?php

namespace App\Http\Controllers;

use App\Models\{
    Artikel,
    KatalogProduk,
    DeteksiDaunTeh,
    User,
    Galeri
};

class AdminController extends Controller
{
    public function dashboard()
    {
        // Statistik Utama
        $stats = [
            'artikel' => Artikel::count(),
            'produk' => KatalogProduk::count(),
            'deteksi' => DeteksiDaunTeh::count(),
            'pengguna' => User::where('role', 'pengunjung')->count(),
            'galeri' => Galeri::count()
        ];

        // Aktivitas Terbaru (Gabungan dari semua modul)
        $aktivitasTerbaru = DeteksiDaunTeh::with(['user', 'jenisPenyakit'])
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'tipe' => 'Deteksi',
                    'pesan' => "Deteksi penyakit {$item->jenisPenyakit->nama_penyakit}",
                    'oleh' => $item->user->nama,
                    'waktu' => $item->created_at
                ];
            });

        return view('admin.dashboard', compact('stats', 'aktivitasTerbaru'));
    }
}