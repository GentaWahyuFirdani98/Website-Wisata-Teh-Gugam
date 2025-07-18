@extends('layouts.app')

@section('title', 'Deteksi Penyakit')


@section('content')
<!--
@guest
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Akses Terbatas
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Anda harus login terlebih dahulu untuk mengakses halaman deteksi penyakit.
            </p>
        </div>
        <div class="mt-8 space-y-6">
            <div class="flex items-center justify-center space-x-4">
                <a href="{{ route('login') }}" 
                   class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                   class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-green-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 border-green-600">
                    Register
                </a>
            </div>
        </div>
    </div>
</div>
@endguest
-->

<!-- Modern Hero Section with Tea Garden Theme -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <!-- Background with Parallax Effect -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-green-800 to-teal-900">
        <div class="absolute inset-0 bg-[url('{{ asset('images/bg2.jpg') }}')] bg-cover bg-center opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
    </div>

    <!-- Floating Tea Leaves Animation -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="tea-leaf-float absolute top-20 left-10 text-4xl opacity-20 animate-bounce" style="animation-delay: 0s;">🍃</div>
        <div class="tea-leaf-float absolute top-32 right-20 text-3xl opacity-15 animate-pulse" style="animation-delay: 2s;">🌿</div>
        <div class="tea-leaf-float absolute bottom-40 left-1/4 text-5xl opacity-10 animate-bounce" style="animation-delay: 4s;">🍃</div>
        <div class="tea-leaf-float absolute bottom-20 right-1/3 text-3xl opacity-20 animate-pulse" style="animation-delay: 6s;">🌱</div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <!-- Icon with Animation -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-emerald-400 to-green-600 rounded-full shadow-2xl mb-6 animate-pulse">
                    <span class="text-4xl">🔬</span>
                </div>
            </div>

            <!-- Title with Gradient Text -->
            <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-emerald-300 via-green-200 to-teal-300 bg-clip-text text-transparent leading-tight">
                AI Deteksi Daun Teh
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-emerald-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                Teknologi canggih untuk menganalisis kesehatan daun teh Anda dengan akurasi tinggi
            </p>

        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Main Content with Modern Design -->
<main class="relative -mt-20 z-20">
    <!-- How It Works Section -->
    <section class="container mx-auto px-4 mb-16">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 max-w-6xl mx-auto border border-gray-100">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-full mb-6">
                    <span class="text-2xl">📋</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Cara Menggunakan</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Ikuti langkah mudah berikut untuk mendeteksi kesehatan daun teh Anda</p>
            </div>

            <!-- Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-6 border-2 border-emerald-100 hover:border-emerald-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">1</div>
                            <h3 class="text-lg font-semibold text-gray-800">Siapkan Foto</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Ambil foto daun teh yang jelas, tidak blur, dan pastikan daun terlihat utuh untuk hasil deteksi optimal.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border-2 border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">2</div>
                            <h3 class="text-lg font-semibold text-gray-800">Upload atau Kamera</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Pilih foto dari galeri atau gunakan kamera real-time untuk deteksi langsung tanpa menyimpan gambar.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border-2 border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">3</div>
                            <h3 class="text-lg font-semibold text-gray-800">Analisis AI</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Sistem AI akan menganalisis gambar dan memberikan hasil deteksi dalam hitungan detik.</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-2xl p-6 border-2 border-orange-100 hover:border-orange-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">4</div>
                            <h3 class="text-lg font-semibold text-gray-800">Lihat Hasil</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Dapatkan informasi lengkap tentang kesehatan daun, jenis penyakit (jika ada), dan tingkat akurasi.</p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-teal-50 to-emerald-50 rounded-2xl p-6 border-2 border-teal-100 hover:border-teal-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">5</div>
                            <h3 class="text-lg font-semibold text-gray-800">Riwayat Tersimpan</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Semua hasil deteksi otomatis tersimpan dalam riwayat untuk referensi dan monitoring jangka panjang.</p>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-rose-50 to-red-50 rounded-2xl p-6 border-2 border-rose-100 hover:border-rose-300 transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-rose-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">6</div>
                            <h3 class="text-lg font-semibold text-gray-800">Tindak Lanjut</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">Gunakan informasi hasil deteksi untuk perawatan yang tepat dan konsultasi dengan ahli jika diperlukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detection Interface -->
    <section class="container mx-auto px-4 mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">

            <!-- Upload Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300">
                <!-- Header -->
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center mr-4">
                        <span class="text-xl">📤</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Upload Gambar</h2>
                        <p class="text-gray-600 text-sm">Pilih foto daun teh untuk dianalisis</p>
                    </div>
                </div>

                <!-- Image Preview -->
                <div id="imagePreviewContainer" class="mb-6 hidden">
                    <div class="relative group">
                        <img id="previewImage" src="#" class="w-full h-64 object-cover rounded-2xl shadow-lg" alt="Preview">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl flex items-center justify-center">
                            <button id="deleteImageBtn" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-3 shadow-lg transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modern Dropzone -->
                <div id="dropzone" class="upload-area border-2 border-dashed border-emerald-200 hover:border-emerald-400 bg-gradient-to-br from-emerald-50 to-green-50 p-8 rounded-2xl flex flex-col items-center justify-center cursor-pointer transition-all duration-300 hover:shadow-lg {{ session('gambar') ? 'hidden' : '' }}">
                    <input type="file" id="imageInput" class="hidden" accept="image/*">

                    <!-- Modern Upload Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>

                    <h3 id="uploadText" class="text-lg font-semibold text-gray-700 mb-2">Seret & Lepas Gambar</h3>
                    <p class="text-gray-500 text-center mb-4">atau klik untuk memilih file</p>
                    <div class="flex items-center space-x-4 text-sm text-gray-400">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                            JPG, PNG
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Max 5MB
                        </span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4 mt-8">
                    <!-- Main Detection Button -->
                    <button id="btnDeteksi" type="button" class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold py-4 px-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Deteksi Sekarang
                        </span>
                    </button>

                    <!-- Real-time Camera Button -->
                    <button id="startRealtime" class="w-full bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white font-semibold py-4 px-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2z"></path>
                            </svg>
                            Kamera Real-time
                        </span>
                    </button>
                </div>

                <!-- Floating Camera Button -->
                <div class="fixed bottom-6 right-6 z-50">
                    <input type="file" accept="image/*" capture="environment" id="cameraFromDeteksi" style="display: none;">
                    <button onclick="document.getElementById('cameraFromDeteksi').click();" class="bg-white hover:bg-gray-50 border-2 border-emerald-200 hover:border-emerald-400 rounded-full p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110">
                        <img src="{{ asset('images/camera.png') }}" alt="Kamera" class="w-8 h-8 object-contain">
                    </button>
                </div>
            </div>

            <!-- Results Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 hover:shadow-2xl transition-all duration-300">
                <!-- Header -->
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-600 rounded-2xl flex items-center justify-center mr-4">
                        <span class="text-xl">🔍</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Hasil Deteksi</h2>
                        <p class="text-gray-600 text-sm">Analisis AI untuk daun teh Anda</p>
                    </div>
                </div>

                <!-- Results Container -->
                <div id="hasilDeteksi" class="min-h-[400px] overflow-y-auto">
                    <!-- Default State -->
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">Siap untuk Analisis</h3>
                        <p class="text-gray-500 text-sm max-w-sm mx-auto leading-relaxed">Upload gambar daun teh atau gunakan kamera real-time untuk memulai deteksi penyakit</p>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-2 gap-4 mt-8">
                            <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-4 border border-emerald-100">
                                <div class="text-2xl font-bold text-emerald-600">95%</div>
                                <div class="text-sm text-gray-600">Akurasi</div>
                            </div>
                            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-4 border border-blue-100">
                                <div class="text-2xl font-bold text-blue-600">&lt;3s</div>
                                <div class="text-sm text-gray-600">Kecepatan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="hidden text-center py-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-full animate-spin mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 font-medium">Menganalisis gambar...</p>
                    <p class="text-gray-500 text-sm mt-1">Mohon tunggu sebentar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Real-time Detection Camera Section -->
    <section class="container mx-auto px-4 mb-16">
        <div id="realtimeContainer" class="hidden">
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 max-w-4xl mx-auto">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-600 rounded-2xl flex items-center justify-center mr-4">
                            <span class="text-xl">📹</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Deteksi Real-time</h2>
                            <p class="text-gray-600 text-sm">Kamera aktif - deteksi langsung</p>
                        </div>
                    </div>
                    <button id="closeCamera" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Tutup Kamera
                        </span>
                    </button>
                </div>

                <!-- Camera Container -->
                <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-inner">
                    <div class="relative mx-auto" style="max-width: 640px;">
                        <video id="liveCamera" autoplay playsinline class="w-full h-auto rounded-2xl" width="640" height="480"></video>
                        <canvas id="boundingCanvas" width="640" height="480" class="absolute top-0 left-0 w-full h-full pointer-events-none"></canvas>

                        <!-- Live Indicator -->
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold flex items-center">
                            <div class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></div>
                            LIVE
                        </div>

                        <!-- Detection Info Overlay -->
                        <div class="absolute bottom-4 left-4 right-4 bg-black/70 backdrop-blur-sm rounded-xl p-4 text-white">
                            <p id="realtimeInfo" class="text-sm">Kamera real-time aktif - Arahkan ke daun teh untuk deteksi otomatis</p>
                        </div>
                    </div>
                </div>

                <!-- Real-time Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-4 border border-green-100 text-center">
                        <div class="text-2xl font-bold text-green-600">Real-time</div>
                        <div class="text-sm text-gray-600">Mode Deteksi</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-4 border border-blue-100 text-center">
                        <div class="text-2xl font-bold text-blue-600">30 FPS</div>
                        <div class="text-sm text-gray-600">Kecepatan</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-4 border border-purple-100 text-center">
                        <div class="text-2xl font-bold text-purple-600">Auto</div>
                        <div class="text-sm text-gray-600">Deteksi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>


    <!-- Modern History Section -->
    <section class="container mx-auto px-4 mb-16">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full mb-6">
                    <span class="text-2xl">📊</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Riwayat Deteksi</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Pantau semua hasil deteksi Anda dengan mudah</p>
            </div>

            @if($riwayat->count() > 0)
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                    <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-6 border border-emerald-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mr-4">
                                <span class="text-xl">📈</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-emerald-600">{{ $riwayat->count() }}</div>
                                <div class="text-sm text-gray-600">Total Deteksi</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                                <span class="text-xl">✅</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-600">{{ $riwayat->where('jenisPenyakit.status_kesehatan', 'sehat')->count() }}</div>
                                <div class="text-sm text-gray-600">Daun Sehat</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 border border-red-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center mr-4">
                                <span class="text-xl">⚠️</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-red-600">{{ $riwayat->where('jenisPenyakit.status_kesehatan', 'sakit')->count() }}</div>
                                <div class="text-sm text-gray-600">Daun Sakit</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border border-blue-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center mr-4">
                                <span class="text-xl">🎯</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-blue-600">{{ number_format($riwayat->avg('confidence') * 100, 1) }}%</div>
                                <div class="text-sm text-gray-600">Rata-rata Akurasi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modern History Cards -->
                <div class="space-y-6" id="historyContainer">
                    @foreach ($riwayat as $i => $data)
                        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden {{ $i >= 10 ? 'hidden more-row' : '' }}">
                            <div class="p-6 md:p-8">
                                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                                    <!-- Image Section -->
                                    <div class="flex-shrink-0">
                                        <div class="relative group">
                                            <img src="{{ asset('storage/deteksi/' . $data->foto_daun) }}"
                                                 class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-2xl shadow-lg group-hover:scale-105 transition-transform duration-300"
                                                 alt="Hasil Deteksi">
                                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 rounded-2xl transition-colors duration-300"></div>
                                        </div>
                                    </div>

                                    <!-- Content Section -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                                            <!-- Main Info -->
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                        @if ($data->jenisPenyakit->status_kesehatan === 'sehat')
                                                            bg-emerald-100 text-emerald-700 border border-emerald-200
                                                        @else
                                                            bg-red-100 text-red-700 border border-red-200
                                                        @endif">
                                                        @if ($data->jenisPenyakit->status_kesehatan === 'sehat')
                                                            ✅ Sehat
                                                        @else
                                                            ⚠️ Sakit
                                                        @endif
                                                    </span>
                                                    <span class="text-sm text-gray-500">
                                                        {{ $data->created_at->format('d M Y, H:i') }}
                                                    </span>
                                                </div>

                                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                                    {{ $data->jenisPenyakit->nama_penyakit ?? 'Daun Sehat' }}
                                                </h3>

                                                @if($data->jenisPenyakit && $data->jenisPenyakit->deskripsi)
                                                    <p class="text-gray-600 text-sm leading-relaxed mb-3 line-clamp-2">
                                                        {{ Str::limit($data->jenisPenyakit->deskripsi, 120) }}
                                                    </p>
                                                @endif
                                            </div>

                                            <!-- Accuracy Badge -->
                                            <div class="flex-shrink-0">
                                                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-4 border border-blue-100 text-center">
                                                    <div class="text-2xl font-bold text-blue-600">{{ number_format($data->confidence * 100, 1) }}%</div>
                                                    <div class="text-xs text-gray-600 mt-1">Akurasi</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                @if ($riwayat->count() > 10)
                    <div class="text-center mt-12">
                        <button id="btnLihatSelengkapnya" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            Lihat Selengkapnya
                        </button>
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Riwayat Deteksi</h3>
                    <p class="text-gray-500 text-lg max-w-md mx-auto mb-8">Mulai deteksi daun teh Anda untuk melihat riwayat hasil analisis di sini</p>
                    <a href="#" onclick="document.querySelector('.upload-area').scrollIntoView({behavior: 'smooth'})" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Mulai Deteksi
                    </a>
                </div>
            @endif
        </div>
    </section>
</main>

@endsection

@push('styles')
<style>
    /* Solusi 1: Perbaiki kontras dan overlay */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Parallax effect */
        min-height: 300px; /* Pastikan tinggi minimum */
        position: relative;
    }

    /* Solusi 2: Tambah gradient yang lebih dramatis */
    .hero-section-alt1 {
        background: 
            linear-gradient(135deg, rgba(34, 197, 94, 0.8) 0%, rgba(21, 128, 61, 0.9) 100%),
            linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
            url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
    }

    /* Solusi 3: Gradient dengan warna hijau teh */
    .hero-section-alt2 {
        background: 
            radial-gradient(circle at center, rgba(22, 163, 74, 0.3) 0%, rgba(21, 128, 61, 0.8) 70%),
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)),
            url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        min-height: 300px;
    }

    /* Solusi 4: Dengan shadow box untuk teks */
    .hero-section-text-enhanced {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        background: rgba(0, 0, 0, 0.3);
        padding: 2rem;
        border-radius: 12px;
        backdrop-filter: blur(8px);
    }

    /* Solusi 5: Fallback jika gambar gagal load */
    .hero-section-fallback {
        background: 
            linear-gradient(135deg, rgb(34, 197, 94) 0%, rgb(21, 128, 61) 100%),
            url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
    }

    /* Media queries untuk responsiveness */
    @media (max-width: 768px) {
        .hero-section {
            background-attachment: scroll; /* Hindari parallax di mobile */
            min-height: 250px;
        }
    }

    /* Animasi subtle untuk hero */
    @keyframes heroFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

        /* Solusi untuk memperjelas gambar hero section */

    /* Opsi 1: Kurangi overlay gelap agar gambar lebih terlihat */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4)), url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
        position: relative;
    }

    /* Opsi 2: Gunakan gradient yang lebih subtle */
    .hero-section-subtle {
        background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
    }

    /* Opsi 3: Tambah brightness dan contrast */
    .hero-section-bright {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: brightness(1.1) contrast(1.1);
        min-height: 300px;
    }

    /* Opsi 4: Gradient hanya di bagian bawah untuk teks */
    .hero-section-bottom-gradient {
        background: url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
        position: relative;
    }

    .hero-section-bottom-gradient::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60%;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        pointer-events: none;
    }

    /* Opsi 5: Menggunakan backdrop blur untuk area teks */
    .hero-section-backdrop {
        background: url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 300px;
        position: relative;
    }

    .hero-text-backdrop {
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(8px);
        padding: 2rem;
        border-radius: 12px;
        display: inline-block;
    }

    /* Perbaikan teks agar lebih kontras */
    .hero-section h1 {
        color: white !important;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .hero-section p {
        color: rgba(255, 255, 255, 0.95) !important;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        font-size: 1.2rem;
        font-weight: 500;
    }

    /* Media query untuk mobile */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 250px;
        }
        
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-section p {
            font-size: 1rem;
        }
    }
    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        border-top: 4px solid var(--primary);
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
        display: none;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush



@push('scripts')
@if(session('gambar'))
<script>
    const penyakit_deskripsi = {
    "Blister Blight": "Si perusak daun muda. Jamur Exobasidium vexans menyebabkan gelembung kecil pada daun muda, terutama saat musim hujan. Jika dibiarkan, dapat menurunkan kualitas panen.",
    "Red Leaf Spot": "Bercak merah yang muncul pada permukaan daun akibat infeksi jamur. Dapat menyebar dengan cepat dalam kondisi lembap dan mengurangi fotosintesis daun.",
    "Anthracnose": "Penyakit jamur yang menyebabkan bercak gelap dan nekrotik pada daun. Sering terjadi pada musim hujan dan dapat merusak kualitas daun secara signifikan.",
    "Bird Eye Spot": "Bercak kecil bulat seperti mata burung yang disebabkan oleh jamur. Mengurangi nilai estetika dan kualitas daun teh.",
    "Brown Blight": "Penyakit yang menyebabkan daun menjadi coklat dan layu. Biasanya disebabkan oleh kondisi lingkungan yang tidak optimal atau serangan patogen.",
    "Gray Light": "Penyakit yang menyebabkan daun tampak pucat atau keabu-abuan. Dapat mengurangi kandungan klorofil dan kualitas daun."
};

</script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
        document.getElementById('previewImage').src = "{{ asset('storage/deteksi/' . session('gambar')) }}";
        document.getElementById('dropzone').classList.add('hidden');
    });
</script>
@endif

<script>
let video = document.getElementById('liveCamera');
let canvas = document.getElementById('boundingCanvas');
let context = canvas.getContext('2d');
let intervalId = null;

document.getElementById('startRealtime').addEventListener('click', async () => {
    document.getElementById('realtimeContainer').classList.remove('hidden');
    document.getElementById('closeCamera').classList.remove('hidden');

    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;

        intervalId = setInterval(() => {
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = video.videoWidth;
            tempCanvas.height = video.videoHeight;
            const tempCtx = tempCanvas.getContext('2d');
            tempCtx.drawImage(video, 0, 0);

            tempCanvas.toBlob(async (blob) => {
                const formData = new FormData();
                formData.append('file', blob, 'frame.jpg');

                try {
                    const res = await fetch('http://127.0.0.1:8000/predict', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await res.json();
                    tampilkanHasilRealtime(result);
                } catch (err) {
                    console.warn('Gagal mengirim ke API:', err);
                }
            }, 'image/jpeg');
        }, 2000);
    } catch (err) {
        alert("Tidak dapat mengakses kamera.");
        console.error(err);
    }
});

document.getElementById('closeCamera').addEventListener('click', () => {
    clearInterval(intervalId);
    document.getElementById('realtimeContainer').classList.add('hidden');
    document.getElementById('closeCamera').classList.add('hidden');

    const stream = video.srcObject;
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    context.clearRect(0, 0, canvas.width, canvas.height);
});

function tampilkanHasilRealtime(result) {
    const canvas = document.getElementById('boundingCanvas');
    const video = document.getElementById('liveCamera');
    const ctx = canvas.getContext('2d');

    // Pastikan canvas terlihat
    canvas.classList.remove('hidden');

    // Ukuran tetap 640x480
    canvas.width = 640;
    canvas.height = 480;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (
        result &&
        result.bounding_box &&
        (result.status === 'Healthy' || result.status === 'Sick') &&
        result.confidence > 0.3
    ) {
        const scaleX = canvas.width / video.videoWidth;
        const scaleY = canvas.height / video.videoHeight;

        const { x, y, width, height } = result.bounding_box;

        ctx.strokeStyle = result.status === 'Healthy' ? 'green' : 'red';
        ctx.lineWidth = 3;
        ctx.strokeRect(x * scaleX, y * scaleY, width * scaleX, height * scaleY);

        // Label di dalam box
        const label = result.kualitas || result.penyakit || result.status;
        ctx.fillStyle = 'black';
        ctx.font = 'bold 16px sans-serif';
        ctx.fillText(
            `${label} (${(result.confidence * 100).toFixed(1)}%)`,
            x * scaleX + 5,
            y * scaleY + 20
        );
    }
}



//MAIN

   document.addEventListener('DOMContentLoaded', function () {
    // Ambil data dari localStorage jika ada
    const preview = localStorage.getItem('previewImage');
    const namaFile = localStorage.getItem('imageName');

    if (preview && namaFile) {
        const previewImg = document.getElementById('previewImage');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const dropzone = document.getElementById('dropzone');
        const imageInput = document.getElementById('imageInput');

        // Tampilkan preview gambar
        previewImg.src = preview;
        imagePreviewContainer.classList.remove('hidden');
        dropzone.classList.add('hidden');

        // Buat File object dari blob
        fetch(preview)
            .then(res => res.blob())
            .then(blob => {
                const file = new File([blob], namaFile || 'kamera.jpg', { type: blob.type });

                // Masukkan file ke dalam input[type=file]
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;

                // Trigger event change untuk proses deteksi jika perlu
                const event = new Event('change');
                imageInput.dispatchEvent(event);
            })
            .catch(err => {
                console.error('Gagal memuat gambar dari localStorage:', err);
                localStorage.removeItem('previewImage');
                localStorage.removeItem('imageName');
            });

        // Hapus data setelah diproses
        localStorage.removeItem('previewImage');
        localStorage.removeItem('imageName');
    }
});


    document.getElementById('cameraFromDeteksi')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        // Tampilkan preview
        const previewImg = document.getElementById('previewImage');
        previewImg.src = event.target.result;
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
        document.getElementById('dropzone').classList.add('hidden');

        // Simpan file ke input utama agar bisa dideteksi
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('imageInput').files = dataTransfer.files;

        // Jalankan deteksi otomatis
        // document.getElementById('btnDeteksi').click();
    };
    reader.readAsDataURL(file);
    });



    const btn = document.getElementById('btnLihatSelengkapnya');
    if (btn) {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.more-row').forEach(row => row.classList.remove('hidden'));
            btn.classList.add('hidden');
        });
    }



    // Image Upload Functionality
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('imageInput');
        dropzone.addEventListener('click', () => { imageInput.click();});
    const uploadText = document.getElementById('uploadText');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('previewImage');
    const hasilDeteksi = document.getElementById('hasilDeteksi');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const btnDeteksi = document.getElementById('btnDeteksi');
    const deleteImageBtn = document.getElementById('deleteImageBtn');

    

    // Handle drag over
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('active', 'border-green-500');
    });

    // Handle drag leave
    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('active', 'border-green-500');
    });

    // Handle drop
    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('active', 'border-green-500');
        
        if (e.dataTransfer.files.length) {
           dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('active', 'border-green-500');

            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;

                // ⛳ WAJIB: panggil fungsi ini untuk proses preview & validasi
                handleImageUpload();
            }
        });
        }
    });

    // Handle file input change
    imageInput.addEventListener('change', handleImageUpload);

    // Handle delete image button
    deleteImageBtn.addEventListener('click', resetImageUpload);

    function resetImageUpload() {
        // Reset file input
        imageInput.value = '';
        
        // Reset UI
        uploadText.textContent = 'Seret & Lepas Gambar di sini\natau Klik untuk Upload';
        dropzone.classList.remove('hidden');
        imagePreviewContainer.classList.add('hidden');
        previewImage.src = '#';
        
        // Reset detection results
        hasilDeteksi.innerHTML = '<div class="text-gray-500 h-full flex items-center justify-center"><p>Hasil deteksi akan muncul di sini setelah Anda mengupload gambar</p></div>';
    }

    function handleImageUpload() {
        if (imageInput.files && imageInput.files[0]) {
            const file = imageInput.files[0];
            
            // Validate file type and size
            if (!file.type.match('image.*')) {
                alert('Hanya file gambar yang diperbolehkan (JPG, PNG)');
                return;
            }
            
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file maksimal 5MB');
                return;
            }
            
            // Update UI
            uploadText.textContent = file.name;
            dropzone.classList.add('hidden');
            imagePreviewContainer.classList.remove('hidden');
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Handle detection button click
    document.getElementById('btnDeteksi').addEventListener('click', async () => {
    const input = document.getElementById('imageInput');
    if (!input.files.length) {
        hasilDeteksi.innerHTML = '<p class="text-red-500">Silakan upload gambar terlebih dahulu.</p>';
        return;
    }

    const file = input.files[0];
    const formData = new FormData();
    formData.append('gambar', file);

    try {
        // 1. Upload file ke Laravel dulu
        const uploadRes = await fetch('/upload-gambar', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        const uploadData = await uploadRes.json();
        const namaFile = uploadData.filename;

        // 2. Kirim file asli ke FastAPI untuk diproses
        const fastApiData = new FormData();
        fastApiData.append('file', file);
        try {
        const res = await fetch('http://127.0.0.1:8000/predict', {
            method: 'POST',
            body: fastApiData
        });

        // Cek kalau response gagal (status 500, 404, dll)
        if (!res.ok) {
            throw new Error(`Server mengembalikan status ${res.status}`);
        }

        const result = await res.json();
        tampilkanHasil(result);
        simpanKeDatabase(namaFile, result); // hanya jika tidak error
        } catch (error) {
            console.error('Gagal memproses deteksi dari FastAPI:', error);
            hasilDeteksi.innerHTML = `
                <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded relative" role="alert">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-1.414 1.414A9 9 0 006.05 17.95l-1.414 1.414M12 9v2m0 4h.01" />
                        </svg>
                        <strong class="font-semibold">Gagal menghubungi server deteksi!</strong>
                    </div>
                    <div class="mt-2 text-sm">
                        Pastikan server FastAPI aktif
                    </div>
                </div>
            `;
        }

        if (result.error) {
            hasilDeteksi.innerHTML = `<p class="text-red-500">${result.error}</p>`;
        } else {
            tampilkanHasil(result);
            simpanKeDatabase(namaFile, result); // ← kirim filename sebenarnya
        }

    } catch (error) {
        console.error('Error:', error);
    }
});



function tampilkanHasil(result) {
    const hasilDeteksi = document.getElementById('hasilDeteksi');

    if (result.error) {
        hasilDeteksi.innerHTML = `<div class="text-red-500 text-center">${result.error}</div>`;
        return;
    }

    const fakta = [
        "Semua jenis teh—hijau, hitam, putih, oolong—berasal dari satu tanaman yang sama: Camellia sinensis.",
        "Kualitas terbaik daun teh dipetik dari pucuk dan dua daun muda di bawahnya.",
        "Daun teh muda biasanya memiliki lebih banyak kafein dan antioksidan dibanding daun tua.",
        "Kondisi lingkungan seperti ketinggian, curah hujan, dan suhu sangat memengaruhi kualitas daun teh.",
        "Waktu terbaik untuk memetik daun teh adalah pagi hari saat embun masih menempel.",
        "Proses pengolahan teh (seperti pengeringan dan fermentasi) menentukan jenis dan rasa teh.",
        "Daun teh sehat memiliki warna hijau cerah dan tekstur yang utuh tanpa bercak.",
        "Jamur dan penyakit pada daun teh bisa menurunkan kualitas hasil panen secara signifikan.",
        "Teh mengandung L-theanine, zat alami yang membantu meningkatkan fokus dan ketenangan.",
        "Pemrosesan yang salah, seperti pemetikan kasar atau penyimpanan lembap, bisa merusak mutu daun teh."
    ];

    const kualitas_deskripsi = {
        "T1": "Kualitas terbaik. Daun masih sangat muda, berwarna hijau cerah, utuh, dan belum terbuka penuh. Cocok untuk teh premium dengan rasa dan aroma unggulan.",
        "T2": "Kualitas bagus. Daun muda yang mulai membuka sedikit. Masih layak untuk teh berkualitas tinggi dengan sedikit penurunan rasa dan aroma dibanding T1.",
        "T3": "Kualitas sedang. Daun sudah lebih terbuka dan usia sedikit lebih tua. Umumnya digunakan untuk produk teh standar atau campuran.",
        "T4": "Kualitas rendah. Daun tua, bisa berwarna kusam atau ada sedikit kerusakan. Biasanya digunakan untuk teh massal atau kebutuhan industri."
    };

    // Array deskripsi penyakit yang sudah ada
    const penyakit_deskripsi = {
        "Blister Blight": "Si perusak daun muda. Jamur Exobasidium vexans menyebabkan gelembung kecil pada daun muda, terutama saat musim hujan. Jika dibiarkan, dapat menurunkan kualitas panen.",
        "Red Leaf Spot": "Bercak merah yang muncul pada permukaan daun akibat infeksi jamur. Dapat menyebar dengan cepat dalam kondisi lembap dan mengurangi fotosintesis daun.",
        "Anthracnose": "Penyakit jamur yang menyebabkan bercak gelap dan nekrotik pada daun. Sering terjadi pada musim hujan dan dapat merusak kualitas daun secara signifikan.",
        "Bird Eye Spot": "Bercak kecil bulat seperti mata burung yang disebabkan oleh jamur. Mengurangi nilai estetika dan kualitas daun teh.",
        "Brown Blight": "Penyakit yang menyebabkan daun menjadi coklat dan layu. Biasanya disebabkan oleh kondisi lingkungan yang tidak optimal atau serangan patogen.",
        "Gray Light": "Penyakit yang menyebabkan daun tampak pucat atau keabu-abuan. Dapat mengurangi kandungan klorofil dan kualitas daun."
    };

    let html = '';
    if (result.status === 'Healthy') {
        html = `
        <div class="space-y-4 text-black font-medium">
            <!-- Kartu Kesehatan -->
            <div class="bg-green-100 border border-green-200 rounded-xl p-4 shadow">
                <h3 class="font-bold text-green-700 flex items-center mb-2">
                    ✅ Daun Sehat
                </h3>
                <p class="mb-1">🌿 <strong>Kualitas:</strong> ${result.kualitas}</p>
                <p>🔍 <strong>Akurasi:</strong> ${(result.confidence * 100).toFixed(1)}%</p>
            </div>

            <!-- Kartu Deskripsi Kualitas -->
            <div class="bg-gray-100 border border-gray-300 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-blue-700 flex items-center mb-2">
                    📘 Penjelasan Kualitas
                </h4>
                <p class="text-sm leading-relaxed">${kualitas_deskripsi[result.kualitas] || '-'}</p>
            </div>

            <!-- Kartu Fakta Unik -->
            <div class="bg-gray-100 border border-gray-300 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-yellow-500 flex items-center mb-2">
                    💡 Fakta Unik
                </h4>
                <p class="text-sm leading-relaxed">${fakta[Math.floor(Math.random() * fakta.length)]}</p>
            </div>
        </div>
        `;
    } 
    else if (result.status === 'Sick') {
        // ✅ PERBAIKAN: Cocokkan nama penyakit dengan deskripsi yang sudah ada
        const deskripsiPenyakit = penyakit_deskripsi[result.penyakit] || 'Deskripsi penyakit tidak tersedia.';
        
        html = `
        <div class="space-y-4 text-black font-normal">
            <!-- Kartu Penyakit -->
            <div class="bg-red-100 border border-red-200 rounded-xl p-4 shadow">
                <h3 class="font-bold text-red-700 flex items-center mb-2 text-base">
                    ❗ Daun Sakit
                </h3>
                <p class="mb-1">🦠 <span class="font-semibold">Penyakit:</span> ${result.penyakit}</p>
                <p>🔍 <span class="font-semibold">Akurasi:</span> ${(result.confidence * 100).toFixed(1)}%</p>
            </div>

            <!-- Kartu Deskripsi -->
            <div class="bg-yellow-100 border border-yellow-200 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-yellow-700 flex items-center mb-2 text-base">
                    📝 Deskripsi Penyakit
                </h4>
                <p class="text-sm leading-relaxed">${deskripsiPenyakit}</p>
            </div>

            <!-- Kartu Fakta Unik -->
            <div class="bg-blue-100 border border-blue-200 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-blue-700 flex items-center mb-2 text-base">
                    💡 Fakta Unik
                </h4>
                <p class="text-sm leading-relaxed">${fakta[Math.floor(Math.random() * fakta.length)]}</p>
            </div>
        </div>
        `;
    } 
    else {
        html = `<div class="text-yellow-700">⚠ ${result.message}</div>`;
    }

    document.getElementById('hasilDeteksi').innerHTML = html;
}

function simpanKeDatabase(namaFile, result) {
    fetch('/rekam', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            gambar: namaFile,
            kualitas: result.kualitas || null,
            penyakit: result.penyakit || null,
            confidence: result.confidence || null,
            status: result.status,
            deskripsi: result.deskripsi || null,
        })
    })
    .then(res => res.json())
    .then(data => console.log("Disimpan ✅", data))
    .catch(err => console.error("Gagal simpan ❌", err));
}


</script>
@endpush
