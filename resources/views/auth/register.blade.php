@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar Akun</h1>

    {{-- Penampil error umum dari controller --}}
    @if ($errors->has('register_error'))
        <p class="text-red-500 text-sm mb-4">{{ $errors->first('register_error') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}" autocomplete="on">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block font-medium">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required autocomplete="name"
                class="w-full border border-gray-300 rounded p-2">
            @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                class="w-full border border-gray-300 rounded p-2">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" required autocomplete="new-password"
                class="w-full border border-gray-300 rounded p-2">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                autocomplete="new-password" class="w-full border border-gray-300 rounded p-2">
        </div>

        <button type="submit"
            class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 w-full">Daftar</button>
    </form>
</div>
@endsection
