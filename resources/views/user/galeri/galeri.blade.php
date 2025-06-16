@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<section class="relative">
    <img src="{{ asset('images/background.png') }}" alt="Kebun Teh" class="w-full h-[150px] md:h-[250px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold">Galeri</h1>
    </div>
</section>

<section class="container mx-auto px-4 md:px-6 py-12">
        @if($galeris->isEmpty())
            <div class="text-center text-gray-500 text-lg h-64 flex items-center justify-center">
                Foto Tidak Tersedia
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
