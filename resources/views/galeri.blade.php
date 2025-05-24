@extends('layouts.app')

@section('title', 'Galeri - Kebun Teh Gunung Gambir')

@section('content')
<!-- Hero Section -->
<section class="relative">
    <img src="{{ asset('images/background.png') }}" alt="Kebun Teh" class="w-full h-[150px] md:h-[250px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold">Galeri</h1>
    </div>
</section>

<!-- Galeri Section -->
<section class="container mx-auto px-4 md:px-6 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach([1, 2, 3, 4, 5, 6, 7, 8] as $item)
        <div class="gallery-img rounded-lg shadow-md overflow-hidden" onclick="openModal('{{ asset("images/wkt$item.jpg") }}')">
            <img src="{{ asset("images/wkt$item.jpg") }}" alt="Kebun Teh {{ $item }}" class="w-full h-48 object-cover">
            <div class="p-3 bg-white">
                <p class="font-medium text-center">Kebun Teh {{ $item }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Modal Preview Gambar -->
<div id="imageModal" class="modal fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center opacity-0 invisible">
    <div class="modal-content relative max-w-4xl w-full p-4">
        <button class="absolute -top-12 right-0 text-white text-3xl hover:text-green-400 transition" onclick="closeModal()">
            &times;
        </button>
        <img id="modalImage" class="w-full max-h-[80vh] object-contain">
        <p class="text-white text-center mt-4 text-xl" id="modalCaption"></p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Modal Functions
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        modalImg.src = src;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside the image
    document.getElementById('imageModal').addEventListener('click', function(e) {
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