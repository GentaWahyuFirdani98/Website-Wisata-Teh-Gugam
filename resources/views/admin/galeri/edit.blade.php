@extends('layouts.admin')
@section('title', 'Galeri')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Foto Galeri</h1>

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Judul Foto</label>
                    <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Foto Saat Ini</label>
                    <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-48 object-cover rounded-lg mb-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="hapus_foto" class="mr-2">
                        <span class="text-sm text-red-600">Hapus foto saat disimpan</span>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('galeri.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection