@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Artikel</label>
            <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Isi Artikel</label>
            <textarea name="isi" rows="10" class="w-full px-4 py-2 border rounded-lg" required>{{ old('isi', $artikel->isi) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Foto (Opsional)</label>
            @if($artikel->foto)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $artikel->foto) }}" alt="Foto Artikel" class="w-1/2 rounded-lg">
                <label class="flex items-center mt-2">
                    <input type="checkbox" name="hapus_foto" class="mr-2">
                    <span class="text-sm text-red-600">Hapus foto saat disimpan</span>
                </label>
            </div>
            @endif
            <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('artikel.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg mr-4">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection