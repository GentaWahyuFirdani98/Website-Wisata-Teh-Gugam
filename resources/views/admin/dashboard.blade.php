@extends('layouts.admin')
@section('title', 'Dashboard')


@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
        <div class="text-sm text-gray-500">
            {{ now()->format('l, d F Y') }}
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-8">
        @foreach([
            ['icon' => 'newspaper', 'color' => 'blue', 'label' => 'Artikel', 'value' => $stats['artikel']],
            ['icon' => 'box-open', 'color' => 'green', 'label' => 'Produk', 'value' => $stats['produk']],
            ['icon' => 'leaf', 'color' => 'yellow', 'label' => 'Deteksi', 'value' => $stats['deteksi']],
            ['icon' => 'users', 'color' => 'purple', 'label' => 'Pengguna', 'value' => $stats['pengguna']],
            ['icon' => 'images', 'color' => 'pink', 'label' => 'Galeri', 'value' => $stats['galeri']]
        ] as $card)
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-{{ $card['color'] }}-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500">{{ $card['label'] }}</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $card['value'] }}</h3>
                </div>
                <div class="p-3 rounded-full bg-{{ $card['color'] }}-100 text-{{ $card['color'] }}-600">
                    <i class="fas fa-{{ $card['icon'] }} text-xl"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Dua Kolom (Aktivitas & Quick Actions) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Aktivitas Terbaru -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-6 text-gray-800">Aktivitas Terbaru</h2>
            <div class="space-y-4">
                @foreach($aktivitasTerbaru as $aktivitas)
                <div class="flex items-start p-4 border-b border-gray-100 last:border-0">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-{{ $aktivitas['tipe'] === 'Deteksi' ? 'leaf' : 'user' }}"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <div>
                                <h4 class="font-semibold">{{ $aktivitas['pesan'] }}</h4>
                                <p class="text-gray-600">Oleh: {{ $aktivitas['oleh'] }}</p>
                            </div>
                            <span class="text-sm text-gray-500">{{ $aktivitas['waktu']->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="space-y-4">
            @foreach([
                ['icon' => 'plus-circle', 'color' => 'green', 'route' => 'artikel.create', 'label' => 'Tambah Artikel', 'desc' => 'Buat konten baru'],
                ['icon' => 'shopping-bag', 'color' => 'blue', 'route' => 'produk.create', 'label' => 'Tambah Produk', 'desc' => 'Tambahkan produk wisata'],
                ['icon' => 'camera', 'color' => 'pink', 'route' => 'galeri.create', 'label' => 'Upload Galeri', 'desc' => 'Tambahkan foto wisata'],
            ] as $action)
            <a href="{{ route($action['route']) }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-md transition flex items-center">
                <div class="p-3 rounded-full bg-{{ $action['color'] }}-100 text-{{ $action['color'] }}-600 mr-4">
                    <i class="fas fa-{{ $action['icon'] }}"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">{{ $action['label'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $action['desc'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
