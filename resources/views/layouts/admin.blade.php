<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Beranda') | Admin - {{ config('app.name') }}</title> 
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .sidebar {
            transition: all 0.3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-green-800 text-white w-64 flex-shrink-0 fixed md:relative h-full z-10">
            <div class="p-4 border-b border-green-700">
                <h1 class="text-xl font-bold flex items-center">
                    <span class="mr-2">TEH</span>
                    <span class="text-green-300">GUGAM</span>
                </h1>
                <p class="text-xs text-green-300">Admin Panel</p>
            </div>
            
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded hover:bg-green-700 {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : '' }}">
                            <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.artikel.index') }}" class="flex items-center p-2 rounded hover:bg-green-700 {{ request()->routeIs('artikel.*') ? 'bg-green-700' : '' }}">
                            <i class="fas fa-newspaper mr-3 w-5 text-center"></i>
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.produk.index') }}" class="flex items-center p-2 rounded hover:bg-green-700 {{ request()->routeIs('produk.*') ? 'bg-green-700' : '' }}">
                            <i class="fas fa-box-open mr-3 w-5 text-center"></i>
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.deteksi.index') }}" class="flex items-center p-2 rounded hover:bg-green-700 {{ request()->routeIs('deteksi.*') ? 'bg-green-700' : '' }}">
                            <i class="fas fa-leaf mr-3 w-5 text-center"></i>
                            Deteksi Daun
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.galeri.index') }}" class="flex items-center p-2 rounded hover:bg-green-700 {{ request()->routeIs('galeri.*') ? 'bg-green-700' : '' }}">
                            <i class="fas fa-images mr-3 w-5 text-center"></i>
                            Galeri
                        </a>
                    </li>

                </ul>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-green-700 bg-green-900">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-lg font-bold">
                        {{ substr(auth()->user()->nama, 0, 1) }}
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">{{ auth()->user()->nama }}</p>
                        <p class="text-xs text-green-300 capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-2 rounded hover:bg-green-800 text-green-300">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Mobile Header -->
            <header class="bg-white shadow-sm md:hidden p-4 flex items-center justify-between">
                <button id="sidebarToggle" class="text-gray-600">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="text-lg font-semibold text-gray-800">TEH<span class="text-green-600">GUGAM</span></h1>
                <div class="w-6"></div> <!-- Spacer for balance -->
            </header>
            
            <!-- Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('open');
        });
    </script>
</body>
</html>
