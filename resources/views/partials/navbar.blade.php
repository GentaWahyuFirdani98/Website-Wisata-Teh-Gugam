<header class="bg-white shadow-sm py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Logo & Brand -->
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 hover:opacity-90 transition-opacity">
                <img src="{{ asset('images/logo_war.png') }}" alt="Gunung Gambir" class="h-10 w-auto">
                <div class="text-left leading-4">
                    <div class="text-sm font-bold text-gray-800">Kebun</div>
                    <div class="text-sm font-bold text-green-600">Teh Gugam</div>
                </div>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex space-x-8 items-center">
            <a href="{{ route('home') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Tentang Kami
            </a>
            <a href="{{ route('galeri') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('galeri') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Galeri
            </a>
            <a href="{{ route('artikel') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('artikel') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Artikel
            </a>
            <a href="{{ route('produk') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('produk') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Produk
            </a>
            <a href="{{ route('deteksi') }}" 
               class="nav-link font-medium transition-colors duration-200 {{ request()->routeIs('deteksi') ? 'text-green-600' : 'text-gray-600 hover:text-green-600' }}">
                Deteksi Daun
            </a>

            <!-- User Authentication Section -->
            @auth
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('profile') }}"
                   class="flex items-center space-x-3 ml-4 hover:opacity-90 transition-opacity duration-200 p-2 rounded-lg hover:bg-gray-50">
                    <img src="{{ asset('images/person.jpg') }}" 
                         alt="User Photo" 
                         class="w-8 h-8 rounded-full border-2 border-gray-200 hover:border-green-300 transition-colors">
                    <span class="text-gray-800 font-medium">{{ Auth::user()->nama }}</span>
                </a>
            @else
                <div class="flex items-center space-x-4 ml-4">
                    <a href="{{ route('login') }}" 
                       class="text-gray-600 hover:text-green-600 font-medium transition-colors duration-200 px-3 py-2 rounded-md hover:bg-green-50">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="bg-green-600 text-white hover:bg-green-700 font-medium transition-colors duration-200 px-4 py-2 rounded-md shadow-sm hover:shadow-md">
                        Register
                    </a>
                </div>
            @endauth
        </nav>
        
        <!-- Mobile Menu Button -->
        <button class="lg:hidden p-2 rounded-md hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2" 
                id="mobile-menu-button"
                type="button"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Toggle mobile menu">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-6 w-6 text-gray-700" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    
    <!-- Mobile Menu -->
    <div class="lg:hidden hidden bg-white border-t border-gray-200 shadow-lg" 
         id="mobile-menu"
         aria-hidden="true">
        <div class="px-4 py-2 space-y-1">
            <!-- Mobile Navigation Links -->
            <a href="{{ route('home') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('home') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('about') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Tentang Kami
            </a>
            <a href="{{ route('galeri') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('galeri') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Galeri
            </a>
            <a href="{{ route('artikel') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('artikel') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Artikel
            </a>
            <a href="{{ route('produk') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('produk') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Produk
            </a>
            <a href="{{ route('deteksi') }}" 
               class="block py-3 px-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('deteksi') ? 'text-green-600 bg-green-50' : 'text-gray-600 hover:text-green-600 hover:bg-gray-50' }}">
                Deteksi Daun
            </a>

            <!-- Mobile User Authentication -->
            @auth
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('profile') }}" 
                       class="flex items-center space-x-3 py-3 px-2 rounded-md hover:bg-gray-50 transition-colors duration-200">
                        <img src="{{ asset('images/person.jpg') }}" 
                             class="w-10 h-10 rounded-full border-2 border-gray-200" 
                             alt="User Photo">
                        <div class="flex-1">
                            <div class="text-gray-800 font-medium">{{ Auth::user()->nama }}</div>
                            <div class="text-sm text-gray-500">
                                {{ Auth::user()->role === 'admin' ? 'Admin Dashboard' : 'Lihat Profile' }}
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                    <a href="{{ route('login') }}" 
                       class="block w-full py-3 px-4 text-center text-gray-600 hover:text-green-600 font-medium border border-gray-300 rounded-md hover:border-green-300 hover:bg-green-50 transition-colors duration-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block w-full py-3 px-4 text-center bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors duration-200 shadow-sm hover:shadow-md">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>