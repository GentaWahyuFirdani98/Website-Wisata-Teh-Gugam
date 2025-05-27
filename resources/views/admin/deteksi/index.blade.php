@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Laporan Deteksi Daun Teh</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Pengguna</th>
                    <th class="px-6 py-3 text-left">Penyakit</th>
                    <th class="px-6 py-3 text-left">Confidence</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deteksis as $deteksi)
                <tr class="border-b">
                    <td class="px-6 py-4">{{ $deteksi->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $deteksi->user->nama }}</td>
                    <td class="px-6 py-4">{{ $deteksi->jenisPenyakit->nama_penyakit }}</td>
                    <td class="px-6 py-4">{{ $deteksi->confidence * 100 }}%</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('deteksi.show', $deteksi->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 bg-gray-100">
            {{ $deteksis->links() }}
        </div>
    </div>
</div>
@endsection