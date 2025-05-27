@extends('layouts.admin')
@section('title', 'Artikel')


@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Artikel Baru</h1>

    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Artikel</label>
            <input type="text" name="judul" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Isi Artikel</label>
            <textarea name="isi" rows="10" class="w-full px-4 py-2 border rounded-lg" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Foto (Opsional)</label>
            <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            Simpan Artikel
        </button>
    </form>
</div>
@endsection