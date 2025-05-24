<header class="bg-white shadow-sm py-4 sticky top-0 z-50">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Gunung Gambir</h1>
        <nav class="hidden md:flex space-x-8 items-center">
            <a href="{{ route('home') }}" class="nav-link font-medium {{ request()->routeIs('home') ? 'text-green-600' : 'text-gray-600' }}">Beranda</a>
            <a href="{{ route('about') }}" class="nav-link font-medium {{ request()->routeIs('about') ? 'text-green-600' : 'text-gray-600' }}">Tentang Kami</a>
            <a href="{{ route('galeri') }}" class="nav-link font-medium {{ request()->routeIs('galeri') ? 'text-green-600' : 'text-gray-600' }}">Galeri</a>
            <a href="{{ route('artikel') }}" class="nav-link font-medium {{ request()->routeIs('artikel') ? 'text-green-600' : 'text-gray-600' }}">Artikel</a>
            <a href="{{ route('produk') }}" class="nav-link font-medium {{ request()->routeIs('produk') ? 'text-green-600' : 'text-gray-600' }}">Produk</a>
            <a href="{{ route('deteksi') }}" class="nav-link font-medium {{ request()->routeIs('deteksi') ? 'text-green-600' : 'text-gray-600' }}">Deteksi Penyakit</a>
            
            @auth
            <div class="flex items-center space-x-4 ml-4">
                <span class="text-gray-600">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-green-600">Logout</button>
                </form>
            </div>
            @else
            <div class="flex items-center space-x-4 ml-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-green-600">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-green-600">Register</a>
            </div>
            @endauth
        </nav>
        
        <!-- Mobile menu button -->
        <button class="md:hidden" id="mobile-menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white py-2 px-4" id="mobile-menu">
        <a href="{{ route('home') }}" class="block py-2 text-gray-600 hover:text-green-600">Beranda</a>
        <a href="{{ route('about') }}" class="block py-2 text-gray-600 hover:text-green-600">Tentang Kami</a>
        <a href="{{ route('galeri') }}" class="block py-2 text-gray-600 hover:text-green-600">Galeri</a>
        <a href="{{ route('artikel') }}" class="block py-2 text-gray-600 hover:text-green-600">Artikel</a>
        <a href="{{ route('produk') }}" class="block py-2 text-gray-600 hover:text-green-600">Produk</a>
        <a href="{{ route('deteksi') }}" class="block py-2 text-gray-600 hover:text-green-600">Deteksi Penyakit</a>
        
        @auth
        <div class="border-t border-gray-200 mt-2 pt-2">
            <span class="block py-2 text-gray-600">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2 text-gray-600 hover:text-green-600 w-full text-left">Logout</button>
            </form>
        </div>
        @else
        <div class="border-t border-gray-200 mt-2 pt-2">
            <a href="{{ route('login') }}" class="block py-2 text-gray-600 hover:text-green-600">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-gray-600 hover:text-green-600">Register</a>
        </div>
        @endauth
    </div>
</header>