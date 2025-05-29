<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    ArtikelController,
    ProdukController,
    DeteksiController,
    GaleriController,
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
// Pengunjung Routes (Login Dulu)
// ========================
Route::middleware(['auth', 'pengunjung'])->group(function () {
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
});

// ========================
// Admin Routes (Login + Role Admin)
// ========================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::resource('artikel', ArtikelController::class);

    Route::resource('produk', ProdukController::class);
        
    Route::resource('deteksi', DeteksiController::class);
        
    Route::resource('galeri', GaleriController::class);
});

// Auth Routes dari Breeze (login, register, logout, forgot password, dll)
require __DIR__.'/auth.php';
