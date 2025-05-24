@extends('layouts.app')

@section('title', 'Artikel - Kebun Teh Gunung Gambir')

@section('content')
<!-- Hero Section -->
<section class="hero-section h-64 flex items-center justify-center">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white">Artikel</h1>
    </div>
</section>

<!-- Main Content -->
<main class="flex-1 px-4 md:px-6 py-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(range(1, 6) as $item)
            <div class="article-card bg-white rounded-lg shadow-md overflow-hidden">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset("images/artikel$item.jpg") }}" alt="Artikel {{ $item }}" 
                         class="w-full h-full object-cover hover:scale-105 transition duration-300 cursor-pointer" 
                         onclick="openModal('{{ asset("images/artikel$item.jpg") }}', 'Judul Artikel {{ $item }}')">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4 text-green-700">Judul Artikel {{ $item }}</h2>
                    <p class="text-gray-600 mb-6">Ringkasan singkat untuk artikel {{ $item }}. Klik untuk baca lebih lanjut.</p>
                    <a href="{{ url('/artikel/' . $item) }}" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                        Lihat Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Modal Preview Gambar -->
<div id="gallery-modal" class="gallery-modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img id="modal-image" class="modal-image" src="" alt="Preview Gambar">
        <p id="image-caption" class="image-caption"></p>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("images/bg2.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    
    .article-card {
        transition: all 0.3s ease;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
</style>
@endpush

@push('scripts')
<script>
    // Modal Functions
    function openModal(src, caption) {
        const modal = document.getElementById('gallery-modal');
        const modalImg = document.getElementById('modal-image');
        const captionText = document.getElementById('image-caption');
        
        modalImg.src = src;
        captionText.textContent = caption;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('gallery-modal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside the image
    document.getElementById('gallery-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endpush