<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Admin - {{ config('app.name') }}</title> 
    <link rel="icon" href="{{ asset('images/icon_war.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
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
        <div id="adminSidebar" class="sidebar bg-green-800 text-white w-64 flex-shrink-0 fixed md:relative h-full z-10">
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
            
            <!-- <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-green-700 bg-green-900">
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
            </div> -->

            <!-- <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-green-700 bg-green-900">
                <a href="{{ route('admin.profile.show') }}" class="flex items-center mb-4 hover:text-gray-300">
                    <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-lg font-bold">
                        {{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-medium">{{ auth()->user()->nama }}</p>
                        <p class="text-xs text-green-300 capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-2 rounded hover:bg-green-800 text-green-300">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Keluar
                    </button>
                </form>
            </div> -->

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-green-700 bg-green-900">
            <!-- Link ke halaman pengunjung -->
            <a href="{{ url('/') }}" target="_blank" class="flex items-center mb-4 hover:text-gray-300">
                <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-lg font-bold">
                    🌐
                </div>
                <div class="ml-3">
                    <p class="font-medium">Lihat Situs</p>
                    <p class="text-xs text-green-300">Ke halaman utama</p>
                </div>
            </a>

            <!-- Link profil admin -->
            <a href="{{ route('admin.profile.show') }}" class="flex items-center mb-4 hover:text-gray-300">
                <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-lg font-bold">
                    {{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ auth()->user()->nama }}</p>
                    <p class="text-xs text-green-300 capitalize">{{ auth()->user()->role }}</p>
                </div>
            </a>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full p-2 rounded hover:bg-green-800 text-green-300">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Keluar
                </button>
            </form>
        </div>

        </div>
        
        <!-- Main Content -->
        <div class="flex-1 md:ml-0">
            <!-- Mobile Header -->
            <header class="bg-white shadow-sm md:hidden p-4 flex items-center justify-between">
                <button id="sidebarToggle" class="text-gray-600">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="text-lg font-semibold text-gray-800">TEH<span class="text-green-600">GUGAM</span></h1>
                <div class="w-6"></div> <!-- Spacer for balance -->
            </header>
            
            <!-- Content -->
            <main class="overflow-y-auto h-full w-full p-4">
                @yield('content')
            </main>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        // Buka/tutup sidebar saat tombol diklik
        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation(); // agar tidak ikut trigger klik luar
            sidebar.classList.toggle('open');
        });

        // Klik di luar sidebar → tutup sidebar
        document.addEventListener('click', function (e) {
            const clickedOutsideSidebar = !sidebar.contains(e.target);
            const clickedOutsideToggle = !toggleBtn.contains(e.target);

            if (sidebar.classList.contains('open') && clickedOutsideSidebar && clickedOutsideToggle) {
                sidebar.classList.remove('open');
            }
        });
    });
</script>

</body>
</html>