{{-- resources/views/user/profile/profile.blade.php --}}
@php($page = 'profile')

@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">

    <h2 class="text-2xl font-bold mb-4">👤 Profil Pengguna</h2>

    {{-- Box Informasi Profil --}}
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/person.jpg') }}" class="w-16 h-16 rounded-full border">
                <div>
                    <p class="text-xl font-semibold">{{ $user->nama }}</p>
                    <p class="text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            <button id="openEditModal" class="text-gray-400 hover:text-gray-600" title="Edit Profil">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.232 5.232l3.536 3.536M4 13v7h7l11-11a2.828 2.828 0 00-4-4L4 13z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Tombol Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mb-8">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Keluar
        </button>
    </form>
</div>

{{-- Modal: Edit Nama & Password --}}
<div id="editNamaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6 overflow-y-auto max-h-[90vh]">
        <h3 class="text-lg font-semibold mb-4">✏️ Edit Profil</h3>

        {{-- Notifikasi --}}
        @if (session('nama_updated'))
            <div class="mb-4 text-sm text-green-600 font-semibold">
                {{ session('nama_updated') }}
            </div>
        @endif
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 font-semibold">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- === Form Ubah Nama === --}}
        <form action="{{ route('profile.update.nama') }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')
            <label class="block font-medium text-sm text-gray-700 mb-1">Nama Baru</label>
            <input type="text" name="nama" value="{{ $user->nama }}"
                   class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500 mb-2">
            @error('nama')
                <p class="text-red-500 text-sm">Kolom Harus Diisi</p>
            @enderror
            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan Nama
            </button>
        </form>

        <hr class="my-4">

        {{-- === Form Ganti Password === --}}
        <form method="POST" action="{{ route('profile.password') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="current_password" class="block font-medium text-sm text-gray-700">Password Lama</label>
                <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="password" class="block font-medium text-sm text-gray-700">Password Baru</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Konfirmasi Password Baru</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    Simpan Password
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <button type="button" id="closeEditModal" class="text-gray-500 hover:underline">Tutup</button>
        </div>
    </div>
</div>
@if (session('nama_updated') || session('status'))
    <div id="successPopup" class="fixed bottom-5 right-5 bg-green-600 text-white px-4 py-3 rounded shadow-lg z-50 transition-opacity duration-300">
        {{ session('nama_updated') ?? session('status') }}
    </div>
@endif
@endsection

@push('scripts')
<script>
    document.getElementById('openEditModal').addEventListener('click', () => {
        document.getElementById('editNamaModal').classList.remove('hidden');
    });
    document.getElementById('closeEditModal').addEventListener('click', () => {
        document.getElementById('editNamaModal').classList.add('hidden');
    });

    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('editNamaModal');
        const openBtn = document.getElementById('openEditModal');
        const closeBtn = document.getElementById('closeEditModal');

        if (openBtn) {
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        }

        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }

        // Auto open modal on validation error
        const hasErrors = document.body.dataset.hasErrors === "true";
        if (hasErrors && modal) {
            modal.classList.remove('hidden');
        }

        // Auto hide success popup
        const successPopup = document.getElementById('successPopup');
        if (successPopup) {
            setTimeout(() => {
                successPopup.style.opacity = '0';
                setTimeout(() => successPopup.remove(), 300); // Remove from DOM after fade
            }, 3000);
        }
    });
</script>
@endpush
