<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    ArtikelController,
    ProdukController,
    DeteksiController,
    GaleriController,
    PenggunaController,
};

// ========================
// Public Routes
// ========================
Route::get('/', fn() => view('home'))->name('home');
Route::get('/tentang-kami', fn() => view('about'))->name('about');
Route::get('/galeri', fn() => view('galeri'))->name('galeri');
Route::get('/produk', fn() => view('produk'))->name('produk');
Route::get('/artikel', fn() => view('artikel'))->name('artikel');

// ========================
// User Routes (Login Dulu)
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
    Route::post('/deteksi', [DeteksiController::class, 'process'])->name('deteksi.process');
});
// ========================
// Admin Routes (Login + Role Admin)
// ========================
Route::middleware(['auth'])->prefix('admin')->group(function () {
        // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Artikel
    Route::resource('artikel', ArtikelController::class)->except(['show']);
    
    // Produk
    Route::resource('produk', ProdukController::class)->except(['show']);
    
    // Deteksi Daun Teh
    Route::resource('deteksi', DeteksiController::class);
    
    // Galeri
    Route::resource('galeri', GaleriController::class)->except(['show']);
    
    // Pengguna
    Route::resource('pengguna', PenggunaController::class)->except(['show']);
    
    // Jenis Penyakit
    Route::resource('penyakit', PenyakitController::class)->except(['show']);

    Route::get('/admin/artikel/data', [ArtikelController::class, 'data'])->name('artikel.data');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('produk', ProdukController::class);
    Route::resource('galeri', GaleriController::class);
    // Route::resource('deteksi', DeteksiController::class)->only(['index', 'show']);

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::resource('produk', ProdukController::class)->except(['show']);
    Route::resource('deteksi', DeteksiController::class)->except(['show']);
    Route::resource('galeri', GaleriController::class)->except(['show']);
    Route::resource('pengguna', PenggunaController::class)->except(['show']);
    Route::resource('penyakit', \App\Http\Controllers\PenyakitController::class)->except(['show']);
});

// Auth Routes dari Breeze (login, register, logout, forgot password, dll)
require __DIR__.'/auth.php';
