@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<style>
    /* Modern Gallery Theme */
    .gallery-img {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .gallery-img:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .gallery-img img {
        transition: transform 0.5s ease;
    }

    .gallery-img:hover img {
        transform: scale(1.1);
    }



    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery-img {
            margin-bottom: 1rem;
        }
    }
</style>

<!-- Enhanced Hero Section -->
<section class="relative h-[150px] md:h-[250px] flex items-center justify-center">
    <img src="{{ asset('images/background.png') }}" alt="Kebun Teh" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold">Galeri</h1>
    </div>
</section>

<!-- Modern Gallery Section -->
<section class="container mx-auto px-4 md:px-6 py-12">
    @if($galeris->isEmpty())
        <div class="text-center text-gray-500 text-lg h-64 flex items-center justify-center">
            <div class="text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-2">Foto Tidak Tersedia</h3>
                <p class="text-gray-500">Galeri sedang dalam proses pengembangan</p>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galeris as $galeri)
                <div class="gallery-img rounded-lg shadow-md overflow-hidden cursor-pointer"
                     onclick="openModal('{{ asset('storage/' . $galeri->foto) }}')">
                    <img src="{{ asset('storage/' . $galeri->foto) }}" class="w-full h-48 object-cover">
                </div>
            @endforeach
        </div>
    @endif
</section>

<!-- Enhanced Lightbox Modal -->
<div id="imageModal"
    class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center opacity-0 invisible transition-opacity duration-300">
    <div class="relative w-full max-w-screen-xl px-4 flex flex-col items-center">
        <img id="modalImage"
             class="w-full sm:w-auto max-w-full sm:max-w-[80vw] max-h-[80vh] object-contain rounded-lg shadow-lg transition duration-300" />
        <p class="text-white text-center mt-4 text-xl" id="modalCaption"></p>
    </div>
    <button onclick="closeModal()"
        class="absolute top-0 left-0 bg-opacity-20 hover:bg-opacity-40 text-white text-4xl px-3 py-1">
        &times;
    </button>

    <button onclick="prevImage()"
        class="absolute left-0 top-1/2 transform -translate-y-1/2  bg-opacity-20 hover:bg-opacity-40 text-white text-3xl px-4 py-2 ">
        &#10094;
    </button>

    <button onclick="nextImage()"
        class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-opacity-20 hover:bg-opacity-40 text-white text-3xl px-4 py-2 ">
        &#10095;
    </button>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/galeri.js') }}"></script>
@endpush
