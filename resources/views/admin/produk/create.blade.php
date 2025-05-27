@extends('layouts.admin')
@section('title', 'Produk')


@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Produk Baru</h1>

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="nama_produk" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Jenis Produk</label>
                <select name="jenis_produk" class="w-full px-4 py-2 border rounded-lg" required>
                    @foreach($jenisProduk as $jenis)
                    <option value="{{ $jenis }}">{{ ucfirst(str_replace('_', ' ', $jenis)) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Harga (Rp)</label>
                <input type="number" name="harga" min="0" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Foto Produk</label>
                <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection