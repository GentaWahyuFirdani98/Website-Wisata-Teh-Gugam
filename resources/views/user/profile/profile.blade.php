@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold mb-4">👤 Profil Pengguna</h2>
            <div class="bg-white rounded-lg shadow p-6 mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/person.jpg') }}" class="w-16 h-16 rounded-full border">
            <div>
                <p class="text-xl font-semibold">{{ $user->nama }}</p>
                <p class="text-gray-500">{{ $user->email }}</p>
            </div>
        </div>
        <button id="openEditModal" class="text-gray-400 hover:text-gray-600" title="Ubah Nama">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.232 5.232l3.536 3.536M4 13v7h7l11-11a2.828 2.828 0 00-4-4L4 13z" />
            </svg>
        </button>
    </div>
    <p class="text-gray-600 mt-3">Role: {{ $user->role }}</p>
</div>


            <!-- @if(session('success'))
                <p class="text-green-600 mb-3">{{ session('success') }}</p>
            @endif

            <form action="{{ route('profile.update.nama') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="nama" class="block mb-2 font-semibold">Ubah Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                    class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-3 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Simpan Perubahan
                </button>
            </form>
        </div> -->

        <!-- <p class="text-gray-600">Role: {{ $user->role }}</p> -->
         <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                Keluar
            </button>
        </form>
    </div>

    
        <p class="text-gray-500">Belum ada riwayat deteksi.</p>
    
</div>
@endsection
<div id="editNamaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-md w-full max-w-sm p-6">
        <h3 class="text-lg font-semibold mb-4">Ubah Nama</h3>
        <form action="{{ route('profile.update.nama') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nama" value="{{ $user->nama }}"
                   class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500">
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div class="mt-4 flex justify-end space-x-2">
                <button type="button" id="closeEditModal" class="px-3 py-1 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/profile.js') }}"></script>
@endpush
