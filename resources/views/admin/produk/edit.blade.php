@extends('layouts.admin')
@section('title', 'Produk')


@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Jenis Produk</label>
                    <select name="jenis_produk" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                        @foreach(['villa', 'kuliner', 'meeting_room', 'camping_ground'] as $jenis)
                        <option value="{{ $jenis }}" {{ $produk->jenis_produk == $jenis ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $jenis)) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Foto Produk</label>
                    @if($produk->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" class="w-32 h-32 object-cover rounded-lg">
                        <label class="flex items-center mt-2">
                            <input type="checkbox" name="hapus_foto" class="mr-2">
                            <span class="text-sm text-red-600">Hapus foto saat disimpan</span>
                        </label>
                    </div>
                    @endif
                    <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('produk.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection