@extends('layouts.app')

@section('title', 'Produk - Kebun Teh Gunung Gambir')

@section('content')
<!-- Hero Section -->
<section class="hero-section h-64 md:h-80 flex items-center justify-center">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white">Produk Kami</h1>
        <p class="text-white text-xl mt-4">Temukan berbagai produk dan layanan unggulan kami</p>
    </div>
</section>

<!-- Produk Section -->
<section class="container mx-auto px-4 md:px-6 py-12">
    <div class="grid gap-8">
<section class="container mx-auto px-4 md:px-6 py-12">
    <div class="grid gap-8">
        @foreach($produks as $product)
        <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <div class="md:w-1/3 overflow-hidden">
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-full h-64 md:h-full object-cover product-image">
            </div>
            <div class="p-6 md:w-2/3">
                <h2 class="text-2xl font-bold text-green-700 mb-3">{{ $product->nama_produk }}</h2>
                <p class="text-gray-600 mb-4">{{ $product->deskripsi }}</p>
                <div class="flex items-center justify-between">
                    <span class="price-tag text-xl font-semibold text-gray-800">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition duration-300">
                        {{ $product->jenis_produk === 'kuliner' ? 'Lihat Menu' : 'Pesan Sekarang' }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("images/produk.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    
    .product-card {
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .product-image {
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .price-tag {
        transition: all 0.3s ease;
    }
    
    .product-card:hover .price-tag {
        color: var(--primary);
    }
</style>
@endpush