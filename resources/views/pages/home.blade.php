@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section h-screen flex items-center justify-center text-white relative">
        <!-- Tombol Kamera -->
         @auth
    @auth
    <input type="file"
        accept="image/*"
        capture="environment"
        id="camera-input"
        style="display: none;">

    <a href="#" onclick="document.getElementById('camera-input').click(); return false;"
    class="fixed bottom-6 right-6 z-50 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('images/camera.png') }}" alt="Kamera"
            class="w-8 h-8 md:w-10 md:h-10 object-contain">
    </a>
    @endauth

@else
    <!-- <a href="{{ route('login') }}"
       class="fixed bottom-6 right-6 z-50 bg-green-600 text-white font-bold py-3 px-5 rounded-full shadow-lg hover:bg-green-700 transition">
        Login untuk Kamera
    </a> -->
    <a href="{{ route('login') }}"
       class="fixed bottom-6 right-6 z-50 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('images/camera.png') }}" alt="Kamera"
             class="w-8 h-8 md:w-10 md:h-10 object-contain">
    </a>
@endauth



        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                Selamat Datang di Kebun Teh Gunung Gambir
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                Nikmati keindahan panorama perkebunan teh dan udara sejuk pegunungan
            </p>
            <a href="#lokasi" class="btn btn-primary inline-block px-8 py-3 rounded-lg font-medium">
                Lokasi Kami
            </a>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Sejarah Kebun Teh Gunung Gambir</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Warisan Hijau dari Masa Kolonial hingga Masa Kini
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est...
                </p>
                <div class="section-divider"></div>
                <a href="{{ route('about') }}" class="text-green-600 font-medium hover:text-green-800 hover:underline">
                    Lihat selengkapnya
                </a>
                <div class="section-divider"></div>
            </div>
        </div>
    </section>

    <!-- Artikel Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Artikel</h2>

            <div class="max-w-4xl mx-auto">
                @foreach($artikels as $artikel)
                    <div class="article-card bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-200">
                        <div class="p-6">
                            <p class="text-gray-500 text-sm mb-2">
                                {{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('d F Y') }}
                            </p>
                            <h3 class="text-2xl font-bold mb-4 text-green-700">
                                {{ $artikel->judul }}
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 150, '...') }}
                            </p>
                            <a href="{{ route('artikel.show', $artikel->slug) }}" class="btn-outline inline-block px-4 py-2 rounded-lg font-medium">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
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

    <!-- Deteksi Penyakit Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Deteksi Penyakit Daun Teh</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Gunakan sistem kami untuk mendeteksi penyakit pada daun teh secara cepat dan akurat. Unggah gambar daun teh yang ingin diperiksa.
                </p>
                    <a href="{{ route('deteksi') }}" 
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition duration-300">
                        Deteksi Sekarang
                    </a>
            </div>
        </div>
    </section>

    <!-- Lokasi Section -->
    <section id="lokasi" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Temukan Cara Menuju ke Kebun Teh Gunung Gambir</h2>
            <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8 items-center">
                <div class="rounded-lg overflow-hidden shadow-lg h-80">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.372342576582!2d113.438999!3d-8.035191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDInMDYuNyJTIDExM8KwMjYnMjkuNyJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        title="Peta Kebun Teh Gunung Gambir">
                    </iframe>
                </div>
                
                <div class="flex flex-col items-center justify-center">
                    <p class="text-gray-700 mb-6 text-center">Nikmati pemandangan alam yang menakjubkan dan udara segar pegunungan di Kebun Teh Gunung Gambir, yang beralamat lengkap di Lanasan RT 03, RW 023, Gelang, Kecamatan Sumberbaru, Kabupaten Jember, Jawa Timur 68156.</p>
                    <a 
                        href="https://maps.app.goo.gl/xC7dBMtNRzkukk2B9" 
                        target="_blank" 
                        class="bg-green-600 hover:bg-green-700 text-white font-medium py-4 px-8 rounded-lg transition duration-300 w-full max-w-xs text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if($galeris->count())
    <section class="py-16 bg-white">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-8">
            @foreach($galeris as $galeri)
                <div class="gallery-item overflow-hidden bg-white shadow-md">
                    <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-48 object-cover">
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('galeri') }}" class="btn btn-outline inline-block px-6 py-2 rounded-lg font-medium">
                Lihat Semua >
            </a>
        </div>
    </section>
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
