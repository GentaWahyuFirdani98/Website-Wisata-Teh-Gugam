<!DOCTYPE html>
<html lang="id">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/icon_war.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/icon_war.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/icon_war.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kebun Teh Gunung Gambir</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-white text-gray-800 font-opensans">
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @if (!Route::is('login') && !Route::is('register'))
        @include('layouts.footer')
    @endif

    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- Tambahkan ini supaya galeri.js bisa bekerja --}}
    @stack('scripts')
</body>
</html>
