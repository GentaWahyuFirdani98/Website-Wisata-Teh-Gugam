@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')
<main class="container mx-auto px-4 py-10">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-4 text-green-700">{{ $artikel->judul }}</h1>

        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}" 
             class="w-full h-auto rounded mb-6 shadow">

        <p class="text-sm text-gray-500 mb-2">
            Dipublikasikan pada {{ $artikel->tanggal_publikasi->translatedFormat('d F Y') }}
        </p>

        <div class="text-gray-800 leading-relaxed prose max-w-none">
            {!! nl2br(e($artikel->isi)) !!}
        </div>

        <a href="{{ route('artikel') }}" class="inline-block mt-6 text-green-600 hover:underline">
            ← Kembali ke Daftar Artikel
        </a>
    </div>
</main>
@endsection
