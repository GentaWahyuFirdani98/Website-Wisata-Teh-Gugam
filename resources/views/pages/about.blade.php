@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<style>
    /* Modern About Us Theme with Background Preservation */
    :root {
        --tea-primary: #2d5016;
        --tea-secondary: #4a7c59;
        --tea-accent: #10b981;
        --tea-light: #f0fdf4;
    }

    /* Enhanced Animations */
    @keyframes slow-zoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.05); }
    }

    .animate-slow-zoom {
        animation: slow-zoom 15s ease-in-out infinite alternate;
    }

    /* Floating Elements */
    .tea-leaf-float {
        animation: leafFloat 8s ease-in-out infinite;
    }

    @keyframes leafFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.3;
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.6;
        }
    }

    /* Card Hover Effects */
    .card-hover {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tea-leaf-float {
            font-size: 1.5rem !important;
        }
    }
</style>

<!-- Enhanced Hero Section with Background Preserved -->
<section class="hero-section relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <!-- Floating Tea Leaves -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="tea-leaf-float absolute top-20 left-10 text-4xl opacity-30" style="animation-delay: 0s;">🍃</div>
        <div class="tea-leaf-float absolute top-32 right-20 text-3xl opacity-25" style="animation-delay: 2s;">🌿</div>
        <div class="tea-leaf-float absolute bottom-40 left-1/4 text-5xl opacity-20" style="animation-delay: 4s;">🍃</div>
        <div class="tea-leaf-float absolute bottom-20 right-1/3 text-3xl opacity-30" style="animation-delay: 6s;">🌱</div>
        <div class="tea-leaf-float absolute top-1/2 left-1/6 text-4xl opacity-25" style="animation-delay: 8s;">🌿</div>
    </div>

    <!-- Enhanced Content -->
    <div class="relative z-10 container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <!-- Welcome Badge -->
            <div class="inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-8">
                <span class="text-emerald-300 text-sm font-medium">🌿 Warisan Hijau Indonesia</span>
            </div>

            <!-- Main Title -->
            <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                <span class="bg-gradient-to-r from-emerald-300 via-green-200 to-teal-300 bg-clip-text text-transparent">
                    Tentang
                </span>
                <br>
                <span class="text-white">Kami</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-emerald-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                Perjalanan panjang dari masa kolonial hingga menjadi destinasi agrowisata terdepan di Indonesia
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-emerald-300 mb-2">1800s</div>
                    <div class="text-white/80 text-sm">Era Kolonial</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-emerald-300 mb-2">100+</div>
                    <div class="text-white/80 text-sm">Tahun Pengalaman</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-emerald-300 mb-2">Premium</div>
                    <div class="text-white/80 text-sm">Kualitas Teh</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Modern Story Section -->
<section class="relative py-20 bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-64 h-64 bg-emerald-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-green-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-full mb-6">
                    <span class="text-2xl">🌱</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Warisan <span class="bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">Hijau</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Dari masa kolonial hingga era modern, perjalanan kami dalam menghadirkan teh berkualitas premium
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Enhanced Text Content -->
                <div class="space-y-8">
                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 card-hover">
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🏛️</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Era Kolonial Belanda</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Kebun Teh Gunung Gambir merupakan salah satu perkebunan teh tertua di Indonesia yang didirikan pada masa kolonial Belanda.
                                    Dengan ketinggian 950-1250 meter di atas permukaan laut, perkebunan ini menawarkan panorama alam yang memukau dan udara sejuk pegunungan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 card-hover">
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🤝</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Komitmen Kualitas</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Kami berkomitmen untuk mempertahankan kualitas teh terbaik sambil menjaga kelestarian alam sekitar. Setiap helai daun teh dipetik dengan teliti
                                    oleh tangan-tangan terampil para pemetik kami yang telah berpengalaman puluhan tahun.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/50 card-hover">
                        <div class="flex items-start space-x-4 mb-6">
                            <div class="w-12 h-12 bg-teal-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🌿</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Destinasi Agrowisata</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Selain sebagai produsen teh berkualitas tinggi, Kebun Teh Gunung Gambir juga telah berkembang menjadi destinasi agrowisata yang menawarkan
                                    pengalaman unik bagi pengunjung untuk melihat langsung proses pengolahan teh dari kebun hingga ke cangkir Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Image Section -->
                <div class="relative">
                    <div class="relative group">
                        <!-- Main Image -->
                        <div class="bg-gradient-to-br from-emerald-400 to-green-600 rounded-3xl p-8 shadow-2xl">
                            <img src="{{ asset('images/wkt4.webp') }}"
                                 alt="Kebun Teh Gunung Gambir"
                                 class="w-full h-96 object-cover rounded-2xl shadow-lg group-hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Floating Stats Cards -->
                        <div class="absolute -top-6 -right-6 bg-white rounded-2xl p-4 shadow-xl border border-gray-100">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-emerald-600">950-1250m</div>
                                <div class="text-xs text-gray-600">Ketinggian</div>
                            </div>
                        </div>

                        <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-4 shadow-xl border border-gray-100">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">100+</div>
                                <div class="text-xs text-gray-600">Tahun</div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-emerald-400 rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Vision & Mission Section -->
<section class="relative py-20 bg-white overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-purple-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full mb-6">
                    <span class="text-2xl">🎯</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Visi & <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Misi</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Komitmen kami dalam menghadirkan pengalaman teh terbaik dan berkelanjutan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Enhanced Vision -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 shadow-lg border border-blue-100 card-hover h-full">
                        <!-- Icon Header -->
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-4">Visi</h3>
                        </div>

                        <!-- Content -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/50">
                            <p class="text-gray-700 text-lg leading-relaxed text-center">
                                Menjadi destinasi agrowisata teh terdepan di Indonesia yang memberikan pengalaman autentik dan berkelanjutan,
                                sambil mempertahankan warisan budaya dan kualitas teh premium untuk generasi mendatang.
                            </p>
                        </div>

                        <!-- Decorative Element -->
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-blue-400 rounded-full opacity-20 animate-pulse"></div>
                    </div>
                </div>

                <!-- Enhanced Mission -->
                <div class="relative group">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 shadow-lg border border-purple-100 card-hover h-full">
                        <!-- Icon Header -->
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-4">Misi</h3>
                        </div>

                        <!-- Content -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/50">
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <span class="text-white text-sm font-bold">1</span>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">
                                        Menghasilkan teh berkualitas premium dengan metode tradisional dan teknologi modern
                                    </p>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <span class="text-white text-sm font-bold">2</span>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">
                                        Memberikan pengalaman wisata edukasi yang berkesan tentang dunia pertanian teh
                                    </p>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <span class="text-white text-sm font-bold">3</span>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">
                                        Menjaga kelestarian lingkungan dan pemberdayaan masyarakat lokal
                                    </p>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <span class="text-white text-sm font-bold">4</span>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">
                                        Melestarikan budaya dan tradisi perkebunan teh Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative Element -->
                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-purple-400 rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Location Section -->
<section class="relative py-20 bg-gradient-to-br from-teal-50 via-emerald-50 to-green-50 overflow-hidden">
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
                    Temukan kami di Jember, Jawa Timur dengan pemandangan alam yang menakjubkan
                </p>
            </div>

            <!-- Enhanced Map Container -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 max-w-5xl mx-auto">
                <div class="p-6 bg-gradient-to-r from-teal-500 to-emerald-600 text-white">
                    <h3 class="text-2xl font-bold flex items-center justify-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Peta Lokasi Kebun Teh Gunung Gambir
                    </h3>
                </div>
                <div class="relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.372342576582!2d113.438999!3d-8.035191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDInMDYuNyJTIDExM8KwMjYnMjkuNyJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid"
                        width="100%"
                        height="500"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        title="Peta Lokasi Kebun Teh Gunung Gambir"
                        class="w-full">
                    </iframe>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent pointer-events-none"></div>
                </div>

                <!-- Location Info Footer -->
                <div class="p-6 bg-gray-50">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">Jember, Jawa Timur</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">950-1250 mdpl</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            <span class="text-gray-700 font-medium">18-22°C</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Articles Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 right-20 w-72 h-72 bg-orange-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-400 to-yellow-600 rounded-full mb-6">
                    <span class="text-2xl">📰</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Media <span class="bg-gradient-to-r from-orange-600 to-yellow-600 bg-clip-text text-transparent">Coverage</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Liputan media tentang keindahan dan keunikan Kebun Teh Gunung Gambir
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Enhanced Article 1 - ORAMI -->
                <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-orange-200 transform hover:-translate-y-2 card-hover">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://cnc-magazine.oramiland.com/parenting/images/wisata-gunung-gambir.width-800.format-webp.webp"
                             alt="Wisata Gunung Gambir Orami"
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Source Badge -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg">
                            <span class="text-sm font-medium text-gray-700">📰 Orami</span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-orange-600 transition-colors duration-300">
                            Wisata Gunung Gambir, Sejuk dan Menenangkan
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3">
                            Gunung Gambir menjadi salah satu destinasi wisata unggulan di Jember yang menyuguhkan panorama kebun teh, udara segar, dan ketenangan alam yang cocok untuk relaksasi keluarga.
                        </p>

                        <a href="https://www.orami.co.id/magazine/wisata-gunung-gambir" target="_blank"
                           class="group/btn inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold transition-colors duration-300">
                            <span class="mr-2">Baca Artikel</span>
                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Enhanced Article 2 - PTPN12 -->
                <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-yellow-200 transform hover:-translate-y-2 card-hover">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/301/2023/11/07/FotoJet-5-2478443330.jpg"
                             alt="Kebun Teh Gunung Gambir PTPN12"
                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Source Badge -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg">
                            <span class="text-sm font-medium text-gray-700">🏢 PTPN12</span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-yellow-600 transition-colors duration-300">
                            Menikmati Suasana Sejuk di Kebun Teh Gunung Gambir di Jember
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3">
                            Artikel dari PTPN12 mengulas suasana sejuk dan pengalaman menyenangkan ketika mengunjungi Kebun Teh Gunung Gambir, tempat ideal untuk pecinta alam dan ketenangan.
                        </p>

                        <a href="https://stagging.ptpn12.com/2023/11/08/menikmati-suasana-sejuk-di-kebun-teh-gunung-gambir-di-jember/" target="_blank"
                           class="group/btn inline-flex items-center text-yellow-600 hover:text-yellow-700 font-semibold transition-colors duration-300">
                            <span class="mr-2">Baca Artikel</span>
                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Enhanced Hero Section with Background Preserved */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),
                    url('{{ asset("images/background.png") }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(45, 80, 22, 0.1));
        z-index: 1;
    }

    .hero-section > * {
        position: relative;
        z-index: 2;
    }

    /* Enhanced Article Cards */
    .article-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .article-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            background-attachment: scroll;
        }
    }
</style>
@endpush