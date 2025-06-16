@extends('layouts.app')

@section('title', 'Register - Kebun Teh Gunung Gambir')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .glass-input {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }
    
    .glass-input:focus {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
    }
    
    .glass-button {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.8), rgba(22, 163, 74, 0.8));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    
    .glass-button:hover {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.9), rgba(22, 163, 74, 0.9));
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);
    }
    
    .floating {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>

<div class="min-h-screen bg-cover bg-center bg-no-repeat relative flex items-center justify-center px-4 py-12"
     style="background-image: url('{{ asset('images/bg2.jpg') }}')">

    <!-- Overlay untuk efek gelap -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Notification area untuk pesan error/warning -->
    @if(session('warning') || $errors->any() || $errors->has('register_error'))
    <div class="absolute top-4 left-4 right-4 z-50">
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-md shadow-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <div class="text-sm text-yellow-700">
                        @if(session('warning'))
                            <p>{{ session('warning') }}</p>
                        @endif
                        @if($errors->has('register_error'))
                            <p>{{ $errors->first('register_error') }}</p>
                        @endif
                        @if($errors->any() && !$errors->has('register_error'))
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Container form register -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Glass card effect -->
        <div class="glass-card floating rounded-2xl shadow-2xl p-8">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Daftar Akun</h1>
                <p class="text-white/80 text-sm">Kebun Teh Gunung Gambir</p>
            </div>

            <!-- Form Register -->
            <form class="space-y-6" action="{{ route('register') }}" method="POST" autocomplete="on">
                @csrf

                <!-- Nama Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-white/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Nama Lengkap"
                        value="{{ old('nama') }}"
                        required
                        autocomplete="name"
                        class="w-full pl-10 pr-4 py-3 glass-input rounded-lg placeholder-white/60 text-white focus:outline-none @error('nama') border-red-500 @enderror"
                    />
                    @error('nama')
                        <p class="mt-1 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-white/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Alamat Email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        class="w-full pl-10 pr-4 py-3 glass-input rounded-lg placeholder-white/60 text-white focus:outline-none @error('email') border-red-500 @enderror"
                    />
                    @error('email')
                        <p class="mt-1 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-white/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required
                        autocomplete="new-password"
                        class="w-full pl-10 pr-4 py-3 glass-input rounded-lg placeholder-white/60 text-white focus:outline-none @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="mt-1 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-white/60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        required
                        autocomplete="new-password"
                        class="w-full pl-10 pr-4 py-3 glass-input rounded-lg placeholder-white/60 text-white focus:outline-none"
                    />
                </div>

                <!-- Register Button -->
                <button
                    type="submit"
                    class="w-full py-3 px-4 glass-button text-white font-medium rounded-lg focus:outline-none transform transition-all duration-300"
                >
                    <span class="flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg>
                        Daftar Sekarang
                    </span>
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-white/80 text-sm">
                    Sudah punya akun?
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-green-300 hover:text-green-200 font-medium transition-colors duration-200">
                            Masuk Sekarang
                        </a>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-hide notification after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.querySelector('.bg-yellow-50');
        if (notification) {
            setTimeout(() => {
                notification.style.transition = 'opacity 0.5s ease-out';
                notification.style.opacity = '0';
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        }
    });
</script>
@endsection