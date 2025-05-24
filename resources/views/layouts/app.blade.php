<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kebun Teh Gunung Gambir</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-white text-gray-800 font-sans">
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @if (!Route::is('login') && !Route::is('register'))
        @include('layouts.footer')
    @endif

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>v