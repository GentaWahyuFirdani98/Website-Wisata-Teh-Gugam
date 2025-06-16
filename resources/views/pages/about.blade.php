@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<section class="hero-section h-[400px] flex items-center justify-center">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white">Tentang Kami</h1>
    </div>
</section>

<!-- Content Section -->
<section class="container mx-auto px-4 md:px-6 py-12">
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8 md:gap-12">
        <!-- Text Content -->
        <div class="md:w-2/3">
            <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-6">Warisan Hijau dari Masa Kolonial</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                <p>
                    Kebun Teh Gunung Gambir merupakan salah satu perkebunan teh tertua di Indonesia yang didirikan pada masa kolonial Belanda. 
                    Dengan ketinggian 950-1250 meter di atas permukaan laut, perkebunan ini menawarkan panorama alam yang memukau dan udara sejuk pegunungan.
                </p>
                <p class="mt-4">
                    Kami berkomitmen untuk mempertahankan kualitas teh terbaik sambil menjaga kelestarian alam sekitar. Setiap helai daun teh dipetik dengan teliti 
                    oleh tangan-tangan terampil para pemetik kami yang telah berpengalaman puluhan tahun.
                </p>
                <p class="mt-4">
                    Selain sebagai produsen teh berkualitas tinggi, Kebun Teh Gunung Gambir juga telah berkembang menjadi destinasi agrowisata yang menawarkan 
                    pengalaman unik bagi pengunjung untuk melihat langsung proses pengolahan teh dari kebun hingga ke cangkir Anda.
                </p>
            </div>
        </div>
        
        <!-- Image -->
        <div class="md:w-1/3 flex justify-center">
            <img src="{{ asset('images/wkt4.webp') }}" alt="Kebun Teh Gunung Gambir" 
                 class="rounded-full w-64 h-64 object-cover shadow-lg border-4 border-white">
        </div>
    </div>
</section>

<!-- Peta Lokasi Section -->
<section class="container mx-auto px-4 md:px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-4xl font-bold text-green-700">Peta Lokasi</h2>
    </div>
    
    <div class="rounded-xl overflow-hidden shadow-xl">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.372342576582!2d113.438999!3d-8.035191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDInMDYuNyJTIDExM8KwMjYnMjkuNyJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid" 
            width="100%" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy"
            title="Peta Lokasi Kebun Teh Gunung Gambir">
        </iframe>
    </div>
</section>

<!-- Artikel Section -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-4xl font-bold text-green-700 inline-block border-b-4 border-green-600 pb-2">
                Beberapa Artikel Tentang Kami
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Artikel 1 - ORAMI -->
            <div class="article-card bg-white rounded-lg overflow-hidden shadow-md">
                <img src="https://cnc-magazine.oramiland.com/parenting/images/wisata-gunung-gambir.width-800.format-webp.webp" 
                     alt="Wisata Gunung Gambir Orami" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Wisata Gunung Gambir, Sejuk dan Menenangkan</h3>
                    <p class="text-gray-600 mb-4">
                        Gunung Gambir menjadi salah satu destinasi wisata unggulan di Jember yang menyuguhkan panorama kebun teh, udara segar, dan ketenangan alam yang cocok untuk relaksasi keluarga.
                    </p>
                    <a href="https://www.orami.co.id/magazine/wisata-gunung-gambir" target="_blank" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                        Baca Artikel
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Artikel 2 - PTPN12 -->
            <div class="article-card bg-white rounded-lg overflow-hidden shadow-md">
                <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/301/2023/11/07/FotoJet-5-2478443330.jpg" 
                     alt="Kebun Teh Gunung Gambir PTPN12" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Menikmati Suasana Sejuk di Kebun Teh Gunung Gambir di Jember</h3>
                    <p class="text-gray-600 mb-4">
                        Artikel dari PTPN12 mengulas suasana sejuk dan pengalaman menyenangkan ketika mengunjungi Kebun Teh Gunung Gambir, tempat ideal untuk pecinta alam dan ketenangan.
                    </p>
                    <a href="https://stagging.ptpn12.com/2023/11/08/menikmati-suasana-sejuk-di-kebun-teh-gunung-gambir-di-jember/" target="_blank" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                        Baca Artikel
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                    url('{{ asset("images/background.png") }}');
        background-size: cover;
        background-position: center;
        height: 50vh;
        width: 100%;
    }
    
    .article-card {
        transition: all 0.3s ease;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush