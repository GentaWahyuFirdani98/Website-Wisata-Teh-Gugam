<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeteksiController;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');

Route::get('/deteksi', function () {
    return view('deteksi');
})->name('deteksi');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (hanya untuk yang sudah login)
//Route::middleware(['auth'])->group(function () {
//    Route::get('/deteksi-penyakit', [DeteksiController::class, 'index'])->name('deteksi');
//    Route::post('/deteksi-penyakit', [DeteksiController::class, 'process'])->name('deteksi.process');
//});