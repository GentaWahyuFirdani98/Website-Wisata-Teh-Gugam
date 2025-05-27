@extends('layouts.admin')
@section('title', 'Artikel')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manajemen Artikel</h1>
        <a href="{{ route('artikel.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i> Tambah Artikel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Penulis</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($artikels as $artikel)
                    <tr>
                        <td class="px-6 py-4">{{ $artikel->judul }}</td>
                        <td class="px-6 py-4">{{ $artikel->user->nama }}</td>
                        <td class="px-6 py-4">{{ $artikel->tanggal_publikasi->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('artikel.edit', $artikel->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus artikel?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-gray-100">
            {{ $artikels->links() }}
        </div>
    </div>
</div>
@endsection