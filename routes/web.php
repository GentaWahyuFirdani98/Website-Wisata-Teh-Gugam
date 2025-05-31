<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\{
    AdminController,
    ArtikelController,
    ProdukController,
    DeteksiController,
    GaleriController
};

// ========================
// Public Routes (Tanpa Login)
// ========================
Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/tentang-kami', fn() => view('pages.about'))->name('about');
Route::get('/produk', fn() => view('pages.produk'))->name('produk');
Route::get('/galeri', fn() => view('user.galeri.galeri'))->name('galeri');
Route::get('/artikel', fn() => view('user.artikel.artikel'))->name('artikel');

// ========================
// Register Routes - Override Breeze
// ========================
// Route::get('/register', [RegisterController::class, 'show'])->middleware('guest')->name('register');
Route::get('/register', [RegisteredUserController::class, 'show'])->middleware('guest')->name('register');


// route tambahan agar tidak bentrok
// Route::post('/deteksi-upload', [DeteksiController::class, 'uploadFromCamera'])->name('deteksi.upload.camera');
// Route::post('/deteksi-upload', [DeteksiController::class, 'uploadFromCamera'])
//     ->middleware('auth') // opsional, kalau memang harus login
//     ->name('deteksi.upload.camera');



// ========================
// Pengunjung Routes (Login Dulu)
// // ========================
// Route::middleware(['auth', 'pengunjung'])->group(function () {
//     Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
//     Route::post('/deteksi', [DeteksiController::class, 'store'])->name('deteksi.upload');
// });

Route::middleware(['auth', 'pengunjung'])->group(function () {
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
    Route::post('/deteksi', [DeteksiController::class, 'store'])->name('deteksi.upload');
    Route::post('/deteksi-upload', [DeteksiController::class, 'uploadFromCamera'])->name('deteksi.upload.camera');
});


// ========================
// Admin Routes (Login + Role Admin) – TIDAK DIUBAH
// ========================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('artikel', ArtikelController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('deteksi', DeteksiController::class);
    Route::resource('galeri', GaleriController::class);
});

// ========================
// Auth Routes dari Breeze (login, logout, dll)
// ========================
require __DIR__.'/auth.php';
