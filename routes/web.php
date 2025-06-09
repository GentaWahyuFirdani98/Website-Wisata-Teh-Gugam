<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\GaleriController as UserGaleriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{
    AdminController,
    ArtikelController,
    ProdukController,
    DeteksiController,
    GaleriController
};
use App\Http\Controllers\user\ArtikelController as UserArtikelController;
use App\Http\Controllers\user\ProductController;

Route::get('/', [UserGaleriController::class, 'beranda'])->name('home');
Route::get('/artikel', [UserArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{slug}', [UserArtikelController::class, 'show'])->name('artikel.show');
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/tentang-kami', fn() => view('pages.about'))->name('about');
Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
Route::get('/register', [RegisteredUserController::class, 'show'])->middleware('guest')->name('register');

Route::middleware(['auth', 'pengunjung'])->group(function () {
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
    Route::post('/deteksi-upload', [DeteksiController::class, 'uploadFromCamera'])->name('deteksi.upload.camera');
    Route::post('/deteksi/submit', [DeteksiController::class, 'submitDeteksi'])->name('deteksi.submit');
    Route::post('/rekam', [DeteksiController::class, 'rekam'])->name('deteksi.rekam');
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
    Route::post('/upload-gambar', [DeteksiController::class, 'uploadGambarAjax'])->name('upload.gambar');


});

Route::middleware('auth')->get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profil/update-nama', [ProfileController::class, 'updateNama'])->name('profile.update.nama');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('artikel', ArtikelController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('deteksi', DeteksiController::class);
    Route::resource('galeri', GaleriController::class);
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
