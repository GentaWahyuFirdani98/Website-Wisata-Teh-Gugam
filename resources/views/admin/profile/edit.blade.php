@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

    <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white rounded-lg shadow p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-4">Informasi Dasar</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', auth()->user()->nama) }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <hr class="my-6 border-gray-200">

                <h2 class="text-lg font-semibold mb-4">Ganti Password</h2>

                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 mb-2">Password Lama</label>
                    <input type="password" name="current_password" id="current_password" autocomplete="new-password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="new_password" id="new_password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700 mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

            </div>
        </div>

        <div class="flex justify-end mt-6 space-x-4">
            <a href="{{ route('admin.profile.show') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection