@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<section class="relative">
    <img src="{{ asset('images/bg2.jpg') }}" alt="Kebun Teh" class="w-full h-[150px] md:h-[250px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold">Artikel</h1>
    </div>
</section>

<main class="flex-1 px-4 md:px-6 py-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($artikels as $artikel)
                <div class="article-card bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}" 
                             class="w-full h-full object-cover hover:scale-105 transition duration-300 cursor-pointer"
                             onclick="openModal('{{ asset('storage/' . $artikel->foto) }}', '{{ $artikel->judul }}')">
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-4 text-green-700">{{ $artikel->judul }}</h2>
                        <p class="text-gray-600 mb-6">{{ Str::limit(strip_tags($artikel->isi), 100) }}</p>
                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="inline-flex items-center text-green-600 font-semibold hover:underline">
                            Lihat Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Belum ada artikel.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $artikels->links() }}
        </div>
    </div>
</main>
@endsection
