@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    /* Modern Tea Garden Tourism Theme */
    :root {
        --tea-primary: #2d5016;
        --tea-secondary: #4a7c59;
        --tea-accent: #10b981;
        --tea-light: #f0fdf4;
        --tea-gradient: linear-gradient(135deg, #2d5016, #4a7c59, #10b981);
    }

    /* Enhanced Animations */
    @keyframes slow-zoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }

    .animate-slow-zoom {
        animation: slow-zoom 20s ease-in-out infinite alternate;
    }

    /* Floating Tea Leaves Animation */
    .tea-leaf-float {
        animation: leafFloat 8s ease-in-out infinite;
    }

    @keyframes leafFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.2;
        }
        25% {
            transform: translateY(-15px) rotate(90deg);
            opacity: 0.4;
        }
        50% {
            transform: translateY(-30px) rotate(180deg);
            opacity: 0.3;
        }
        75% {
            transform: translateY(-15px) rotate(270deg);
            opacity: 0.4;
        }
    }

    /* Line Clamp Utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Enhanced Button Animations */
    .btn-modern {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    /* Responsive Design Enhancements */
    @media (max-width: 768px) {
        .tea-leaf-float {
            font-size: 1.5rem !important;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>
    <!-- Modern Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Enhanced Background with Parallax -->
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-green-800 to-teal-900">
            <div class="absolute inset-0 bg-[url('{{ asset('images/teh.jpg') }}')] bg-cover bg-center opacity-40 animate-slow-zoom"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Tea Leaves Animation -->
            <div class="tea-leaf-float absolute top-20 left-10 text-5xl opacity-20 animate-bounce" style="animation-delay: 0s;">🍃</div>
            <div class="tea-leaf-float absolute top-32 right-20 text-4xl opacity-15 animate-pulse" style="animation-delay: 2s;">🌿</div>
            <div class="tea-leaf-float absolute bottom-40 left-1/4 text-6xl opacity-10 animate-bounce" style="animation-delay: 4s;">🍃</div>
            <div class="tea-leaf-float absolute bottom-20 right-1/3 text-4xl opacity-20 animate-pulse" style="animation-delay: 6s;">🌱</div>
            <div class="tea-leaf-float absolute top-1/2 left-1/6 text-3xl opacity-15 animate-bounce" style="animation-delay: 8s;">🌿</div>
            <div class="tea-leaf-float absolute top-1/3 right-1/6 text-5xl opacity-10 animate-pulse" style="animation-delay: 10s;">🍃</div>

            <!-- Geometric Shapes -->
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-emerald-400/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-48 h-48 bg-green-400/10 rounded-full blur-xl animate-pulse" style="animation-delay: 3s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 container mx-auto px-4 text-center">
            <div class="max-w-5xl mx-auto">
                <!-- Welcome Badge -->
                <div class="inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-8">
                    <span class="text-emerald-300 text-sm font-medium">🌿 Wisata Alam Premium</span>
                </div>

                <!-- Main Title -->
                <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                    <span class="bg-gradient-to-r from-emerald-300 via-green-200 to-teal-300 bg-clip-text text-transparent">
                        Kebun Teh
                    </span>
                    <br>
                    <span class="text-white">Gunung Gambir</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-emerald-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Nikmati keindahan panorama perkebunan teh hijau yang memukau dan udara sejuk pegunungan di ketinggian 950-1250 mdpl
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                    <a href="#lokasi" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Lokasi Kami
                    </a>

                    @auth
                        <a href="{{ route('deteksi') }}" class="group inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-2xl border border-white/30 hover:border-white/50 backdrop-blur-sm transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Deteksi AI
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="group inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-2xl border border-white/30 hover:border-white/50 backdrop-blur-sm transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Masuk
                        </a>
                    @endauth
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-bold text-emerald-300 mb-2">950-1250m</div>
                        <div class="text-white/80 text-sm">Ketinggian</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-bold text-emerald-300 mb-2">18-22°C</div>
                        <div class="text-white/80 text-sm">Suhu Sejuk</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <div class="text-3xl font-bold text-emerald-300 mb-2">100+ Ha</div>
                        <div class="text-white/80 text-sm">Luas Area</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Camera Button -->
        @auth
            <input type="file" accept="image/*" capture="environment" id="camera-input" style="display: none;">
            <button onclick="document.getElementById('camera-input').click();" class="fixed bottom-6 right-6 z-50 bg-white hover:bg-gray-50 rounded-full p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 border-2 border-emerald-200 hover:border-emerald-400">
                <img src="{{ asset('images/camera.png') }}" alt="Kamera" class="w-8 h-8 object-contain">
            </button>
        @else
            <a href="{{ route('login') }}" class="fixed bottom-6 right-6 z-50 bg-white hover:bg-gray-50 rounded-full p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 border-2 border-emerald-200 hover:border-emerald-400">
                <img src="{{ asset('images/camera.png') }}" alt="Kamera" class="w-8 h-8 object-contain">
            </a>
        @endauth

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Modern History Section -->
    <section class="relative py-20 bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-64 h-64 bg-emerald-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-green-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-full mb-6">
                        <span class="text-2xl">📜</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Sejarah <span class="bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">Kebun Teh</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Warisan Hijau dari Masa Kolonial hingga Masa Kini
                    </p>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div class="space-y-6">
                        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm mr-3">1</span>
                                Era Kolonial
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                Kebun Teh Gunung Gambir didirikan pada masa kolonial Belanda sebagai salah satu perkebunan teh tertua di Indonesia. Lokasi strategis di ketinggian 950-1250 mdpl memberikan kondisi ideal untuk pertumbuhan teh berkualitas tinggi.
                            </p>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm mr-3">2</span>
                                Masa Kini
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                Kini berkembang menjadi destinasi wisata alam yang memadukan keindahan perkebunan teh dengan teknologi modern, termasuk sistem deteksi penyakit daun teh berbasis AI untuk menjaga kualitas produksi.
                            </p>
                        </div>
                    </div>

                    <!-- Visual Content -->
                    <div class="relative">
                        <div class="bg-gradient-to-br from-emerald-400 to-green-600 rounded-3xl p-8 shadow-2xl">
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 text-center">
                                <div class="text-6xl mb-4">🏔️</div>
                                <h4 class="text-2xl font-bold text-white mb-4">Panorama Menakjubkan</h4>
                                <p class="text-emerald-100 leading-relaxed">
                                    Nikmati pemandangan hamparan hijau perkebunan teh yang membentang luas dengan latar belakang pegunungan yang memukau
                                </p>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-pulse"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-emerald-400 rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="text-center mt-16">
                    <a href="{{ route('about') }}" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <span class="mr-2">Pelajari Lebih Lanjut</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Articles Section -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-72 h-72 bg-emerald-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-green-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full mb-6">
                    <span class="text-2xl">📰</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Artikel & <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Berita</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Temukan informasi terbaru seputar dunia teh, tips wisata, dan perkembangan kebun teh kami
                </p>
            </div>

            @if($artikels->count() > 0)
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        @foreach($artikels as $index => $artikel)
                            <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-emerald-200 transform hover:-translate-y-2">
                                <!-- Image Container -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $artikel->foto) }}"
                                         alt="{{ $artikel->judul }}"
                                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    <!-- Date Badge -->
                                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg">
                                        <span class="text-sm font-medium text-gray-700">
                                            {{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-8">
                                    <h3 class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-emerald-600 transition-colors duration-300">
                                        {{ $artikel->judul }}
                                    </h3>

                                    <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 120, '...') }}
                                    </p>

                                    <a href="{{ route('artikel.show', $artikel->slug) }}"
                                       class="group/btn inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold transition-colors duration-300">
                                        <span class="mr-2">Baca Selengkapnya</span>
                                        <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-600 mb-4">Artikel Segera Hadir</h3>
                    <p class="text-gray-500 text-lg max-w-md mx-auto">Kami sedang menyiapkan artikel-artikel menarik seputar dunia teh untuk Anda</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Artikel Section 
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Artikel</h2>
            
            <div class="max-w-4xl mx-auto">
                Artikel 1 
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Sejarah Perkebunan Teh</h3>
                        <p class="text-gray-600 mb-4">
                            Mengenal sejarah panjang perkebunan teh Gunung Gambir sejak zaman kolonial Belanda hingga saat ini.
                        </p>
                        <a href="{{ route('artikel') }}" class="btn-outline inline-block px-4 py-2 rounded-lg font-medium">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                
                Artikel 2 
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-200">
                    <div class="p-6">
                        <p class="text-gray-500 text-sm mb-2">25 Juni 2023</p>
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Proses Pengolahan Teh</h3>
                        <p class="text-gray-600 mb-4">
                            Melihat lebih dekat bagaimana daun teh segar diolah menjadi teh berkualitas tinggi di pabrik kami.
                        </p>
                        <a href="{{ route('artikel') }}" class="btn-outline inline-block px-4 py-2 rounded-lg font-medium">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                
                Artikel 3 
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-200">
                    <div class="p-6">
                        <p class="text-gray-500 text-sm mb-2">10 Juli 2023</p>
                        <h3 class="text-2xl font-bold mb-4 text-green-700">Wisata Alam Gunung Gambir</h3>
                        <p class="text-gray-600 mb-4">
                            Eksplorasi berbagai aktivitas wisata alam yang bisa dilakukan di sekitar perkebunan teh.
                        </p>
                        <a href="{{ route('artikel') }}" class="btn-outline inline-block px-4 py-2 rounded-lg font-medium">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Modern AI Detection Section -->
    <section class="relative py-20 bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-50 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-purple-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-400 to-blue-600 rounded-full mb-6">
                        <span class="text-2xl">🔬</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Deteksi <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">AI</span> Penyakit Teh
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Teknologi kecerdasan buatan terdepan untuk mendeteksi penyakit daun teh dengan akurasi tinggi dalam hitungan detik
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 text-center group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">⚡</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Deteksi Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">Hasil analisis dalam hitungan detik dengan teknologi AI terdepan</p>
                    </div>

                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 text-center group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Akurasi Tinggi</h3>
                        <p class="text-gray-600 leading-relaxed">Tingkat akurasi hingga 95% untuk berbagai jenis penyakit daun teh</p>
                    </div>

                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 text-center group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl">📱</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Mudah Digunakan</h3>
                        <p class="text-gray-600 leading-relaxed">Interface yang intuitif, cukup upload foto atau gunakan kamera langsung</p>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="bg-gradient-to-r from-purple-500 to-blue-600 rounded-3xl p-12 text-center text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-6">Siap Mencoba Teknologi AI Kami?</h3>
                    <p class="text-xl text-purple-100 mb-8 max-w-2xl mx-auto">
                        Upload gambar daun teh Anda dan dapatkan analisis kesehatan yang akurat dalam sekejap
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="{{ route('deteksi') }}"
                           class="group inline-flex items-center px-8 py-4 bg-white text-purple-600 hover:text-purple-700 font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Mulai Deteksi
                        </a>

                        @guest
                            <a href="{{ route('register') }}"
                               class="group inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-2xl border border-white/30 hover:border-white/50 backdrop-blur-sm transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Daftar Gratis
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Location Section -->
    <section id="lokasi" class="relative py-20 bg-gradient-to-br from-teal-50 via-emerald-50 to-green-50 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-72 h-72 bg-teal-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-emerald-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-teal-400 to-emerald-600 rounded-full mb-6">
                        <span class="text-2xl">📍</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Lokasi <span class="bg-gradient-to-r from-teal-600 to-emerald-600 bg-clip-text text-transparent">Kami</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Temukan kami di Jember, Jawa Timur dengan pemandangan alam yang menakjubkan dan udara segar pegunungan
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <!-- Map Container -->
                    <div class="order-2 lg:order-1">
                        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                            <div class="p-6 bg-gradient-to-r from-teal-500 to-emerald-600 text-white">
                                <h3 class="text-xl font-bold flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Peta Lokasi
                                </h3>
                            </div>
                            <div class="relative">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.372342576582!2d113.438999!3d-8.035191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDInMDYuNyJTIDExM8KwMjYnMjkuNyJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid"
                                    width="100%"
                                    height="400"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    title="Peta Kebun Teh Gunung Gambir"
                                    class="w-full">
                                </iframe>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Info -->
                    <div class="order-1 lg:order-2 space-y-6">
                        <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center text-white text-sm mr-3">📍</span>
                                Informasi Lokasi
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Alamat Lengkap</h4>
                                        <p class="text-gray-600">Lanasan RT 03, RW 023, Gelang, Kecamatan Sumberbaru, Kabupaten Jember, Jawa Timur 68156</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Ketinggian</h4>
                                        <p class="text-gray-600">950-1250 meter di atas permukaan laut</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Suhu</h4>
                                        <p class="text-gray-600">18-22°C (sejuk sepanjang hari)</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">Akses</h4>
                                        <p class="text-gray-600">Mudah dijangkau dari pusat kota Jember</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-gradient-to-r from-teal-500 to-emerald-600 rounded-3xl p-8 text-white shadow-2xl">
                            <h4 class="text-xl font-bold mb-4">Rencanakan Kunjungan Anda</h4>
                            <p class="text-teal-100 mb-6">Nikmati pengalaman wisata teh yang tak terlupakan</p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="https://maps.app.goo.gl/xC7dBMtNRzkukk2B9" target="_blank" class="flex-1 bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 text-center backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    Buka di Maps
                                </a>
                                <a href="tel:+62123456789" class="flex-1 bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 text-center backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($galeris->count() > 0)
    <!-- Modern Gallery Section -->
    <section class="relative py-20 bg-gradient-to-br from-gray-50 via-emerald-50 to-green-50 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 right-10 w-64 h-64 bg-emerald-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-green-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-pink-400 to-rose-600 rounded-full mb-6">
                        <span class="text-2xl">📸</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Galeri <span class="bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">Foto</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Jelajahi keindahan kebun teh kami melalui koleksi foto yang menakjubkan
                    </p>
                </div>

                <!-- Modern Masonry Gallery -->
                <div class="gallery-container mb-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($galeris->take(8) as $index => $galeri)
                            <div class="gallery-item group cursor-pointer {{ $index % 7 == 0 ? 'md:col-span-2 md:row-span-2' : '' }} {{ $index % 5 == 0 && $index != 0 ? 'lg:col-span-2' : '' }}"
                                 onclick="openLightbox('{{ asset('storage/' . $galeri->foto) }}', '{{ $galeri->judul }}')">
                                <div class="relative overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 bg-white">
                                    <!-- Image Container -->
                                    <div class="relative overflow-hidden {{ $index % 7 == 0 ? 'h-96 md:h-full' : 'h-64' }}">
                                        <img src="{{ asset('storage/' . $galeri->foto) }}"
                                             alt="{{ $galeri->judul }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                                        <!-- Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        <!-- Hover Content -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                            <div class="bg-white/20 backdrop-blur-sm rounded-full p-4 transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Title Overlay -->
                                        <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <h3 class="text-white font-semibold text-lg line-clamp-2">{{ $galeri->judul }}</h3>
                                        </div>
                                    </div>

                                    <!-- Category Badge -->
                                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 shadow-lg">
                                        <span class="text-xs font-medium text-gray-700">📷 Foto</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- View All Button -->
                <div class="text-center">
                    <a href="{{ route('galeri') }}"
                       class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="mr-2">Lihat Semua Galeri</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="relative max-w-4xl max-h-full">
            <!-- Close Button -->
            <button onclick="closeLightbox()"
                    class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors duration-200 z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Image Container -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-2xl">
                <img id="lightbox-image" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain">
                <div class="p-6 bg-gradient-to-r from-pink-500 to-rose-600 text-white">
                    <h3 id="lightbox-title" class="text-xl font-semibold"></h3>
                </div>
            </div>
        </div>
    </div>
    @endif


@endsection

@push('styles')
<style>
    html {
        scroll-behavior: smooth;
    }
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/teh.jpg') }}');
        background-size: cover;
        background-position: center;
    }
    
    .btn {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .btn-primary {
        background-color: var(--primary);
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .btn-outline {
        border: 2px solid var(--primary);
        color: var(--primary);
    }
    
    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }
    
    .gallery-item {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .gallery-item:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .section-divider {
        height: 1px;
        background: linear-gradient(to right, transparent, var(--primary), transparent);
        margin: 1.5rem auto;
        width: 80px;
    }
    
    .article-card {
        transition: all 0.3s ease;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* Enhanced Gallery Styles */
    .gallery-container {
        perspective: 1000px;
    }

    .gallery-item {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        transform-style: preserve-3d;
    }

    .gallery-item:hover {
        transform: translateY(-8px) rotateX(5deg) !important;
        z-index: 10;
    }

    /* Lightbox Styles */
    #lightbox {
        animation: fadeIn 0.3s ease-out;
        transition: opacity 0.3s ease;
    }

    #lightbox.hidden {
        animation: fadeOut 0.3s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: scale(1);
        }
        to {
            opacity: 0;
            transform: scale(0.9);
        }
    }

    /* Responsive Gallery */
    @media (max-width: 768px) {
        .gallery-item {
            margin-bottom: 1rem;
        }

        .gallery-item.md\:col-span-2 {
            grid-column: span 1 !important;
        }

        .gallery-item.md\:row-span-2 {
            grid-row: span 1 !important;
        }

        .gallery-item .h-96 {
            height: 16rem !important;
        }
    }
    
    /* Modal Styles */
    .gallery-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gallery-modal.active {
        display: flex;
        opacity: 1;
    }
    
    .modal-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
    }
    
    .modal-image {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
    }
    
    .close-modal {
        position: absolute;
        top: -40px;
        right: 0;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
    }
    
    .image-caption {
        color: white;
        text-align: center;
        margin-top: 15px;
        font-size: 1.2rem;
    }
</style>
@endpush

@push('scripts')
<script>
    // Kamera: Ambil gambar dari kamera dan simpan sementara untuk redirect ke deteksi
    document.getElementById('camera-input')?.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(event) {
            localStorage.setItem('previewImage', event.target.result); // simpan Base64
            localStorage.setItem('imageName', file.name);
            window.location.href = "/deteksi"; // redirect
        };
        reader.readAsDataURL(file);
    });
</script>
@endpush

@push('scripts')
<script>
    // Modern Lightbox Functionality
    function openLightbox(imageSrc, title) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');

        lightboxImage.src = imageSrc;
        lightboxTitle.textContent = title;

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';

        // Add entrance animation
        setTimeout(() => {
            lightbox.style.opacity = '1';
        }, 10);
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');

        lightbox.style.opacity = '0';

        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Enhanced interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Close lightbox on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        // Close lightbox on background click
        const lightbox = document.getElementById('lightbox');
        if (lightbox) {
            lightbox.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeLightbox();
                }
            });
        }

        // Gallery item hover effects
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach((item, index) => {
            item.addEventListener('mouseenter', function() {
                // Add subtle animation delay for neighboring items
                const neighbors = Array.from(galleryItems).filter((_, i) =>
                    Math.abs(i - index) <= 2 && i !== index
                );

                neighbors.forEach((neighbor, i) => {
                    setTimeout(() => {
                        neighbor.style.transform = 'translateY(-2px) scale(1.02)';
                    }, i * 50);
                });
            });

            item.addEventListener('mouseleave', function() {
                const neighbors = Array.from(galleryItems).filter((_, i) =>
                    Math.abs(i - index) <= 2 && i !== index
                );

                neighbors.forEach(neighbor => {
                    neighbor.style.transform = '';
                });
            });
        });

        // Lazy loading for gallery images
        const galleryImages = document.querySelectorAll('.gallery-item img');
        if (galleryImages.length > 0) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.style.opacity = '0';
                        img.style.transition = 'opacity 0.5s ease';

                        img.onload = () => {
                            img.style.opacity = '1';
                        };

                        observer.unobserve(img);
                    }
                });
            });

            galleryImages.forEach(img => {
                imageObserver.observe(img);
            });
        }
    });
</script>
@endpush
