@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Laporan Deteksi Daun Teh</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Table Content dengan Slide Animation -->
        <div id="tableContent" class="transition-all duration-400 ease-out">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penyakit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Confidence</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($deteksis as $deteksi)
                        <tr class="border-b hover:bg-gray-50 transition-all duration-200 hover:translate-x-1">
                            <td class="px-6 py-4">{{ $deteksi->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">{{ $deteksi->user->nama }}</td>
                            <td class="px-6 py-4">{{ $deteksi->jenisPenyakit->nama_penyakit }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-transform duration-200 hover:scale-105
                                    {{ $deteksi->confidence >= 0.8 ? 'bg-green-100 text-green-800' : 
                                       ($deteksi->confidence >= 0.6 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ number_format($deteksi->confidence * 100, 2) }}%
                                </span>
                            </td>
                            <td class="py-4">
                                <!-- <a href="{{ route('admin.deteksi.show', $deteksi->id) }}" 
                                   class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition-all duration-200">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a> -->
                                <form action="{{ route('admin.deteksi.destroy', $deteksi->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-md transition-all duration-200">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Enhanced Pagination Section -->
        @if($deteksis->hasPages())
        <div class="px-6 py-4 bg-gray-50 border-t">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                {{-- Pagination Info --}}
                <div class="text-sm text-gray-700">
                    <span class="font-medium">Menampilkan</span>
                    <span class="font-semibold text-gray-900">{{ $deteksis->firstItem() }}</span>
                    <span>sampai</span>
                    <span class="font-semibold text-gray-900">{{ $deteksis->lastItem() }}</span>
                    <span>dari</span>
                    <span class="font-semibold text-gray-900">{{ $deteksis->total() }}</span>
                    <span>hasil</span>
                </div>

                {{-- Tombol Hapus Semua --}}
                <form action="{{ route('admin.deteksi.destroyAll') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus SEMUA hasil deteksi daun teh?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow transition-colors duration-200">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus Semua Deteksi
                    </button>
                    <!-- Tombol Lihat Statistik -->
                    <button type="button"
                            onclick="document.getElementById('statistikModal').classList.remove('hidden')"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition-colors duration-200">
                        <i class="fas fa-chart-bar mr-2"></i> Lihat Statistik
                    </button>

                </form>
            </div>

            <!-- Custom Pagination -->
            <div class="mt-4 flex items-center justify-center">
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-1 select-none">
                    {{-- Previous Page Link --}}
                    @if ($deteksis->onFirstPage())
                        <span class="inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 hidden sm:inline">Previous</span>
                        </span>
                    @else
                        <a href="{{ $deteksis->previousPageUrl() }}" 
                           class="slide-link inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 hover:text-gray-900 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 active:translate-y-0 active:shadow-sm relative overflow-hidden"
                           data-direction="prev">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 hidden sm:inline">Previous</span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($deteksis->getUrlRange(1, $deteksis->lastPage()) as $page => $url)
                        @if ($page == $deteksis->currentPage())
                            <span class="inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-semibold text-white bg-gradient-to-br from-blue-500 to-blue-700 border border-blue-500 rounded-lg shadow-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                               class="slide-link inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 hover:text-gray-900 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 active:translate-y-0 active:shadow-sm relative overflow-hidden"
                               data-direction="auto">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($deteksis->hasMorePages())
                        <a href="{{ $deteksis->nextPageUrl() }}" 
                           class="slide-link inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 hover:text-gray-900 hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 active:translate-y-0 active:shadow-sm relative overflow-hidden"
                           data-direction="next">
                            <span class="mr-1 hidden sm:inline">Next</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center min-w-10 h-10 px-3 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                            <span class="mr-1 hidden sm:inline">Next</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Modal Statistik -->
<div id="statistikModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6 relative">
        <button onclick="document.getElementById('statistikModal').classList.add('hidden')" 
                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
        <h2 class="text-xl font-bold mb-4">Statistik Hasil Deteksi Penyakit</h2>

        @if($statistik->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($statistik as $nama => $jumlah)
                    <div class="bg-white shadow rounded-lg p-4 border-l-4 
                                {{ str_contains(strtolower($nama), 'blight') ? 'border-red-500' : 'border-green-500' }}">
                        <h3 class="text-sm text-gray-500">{{ $nama }}</h3>
                        <p class="text-2xl font-semibold text-gray-800">{{ $jumlah }} kasus</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Belum ada data statistik tersedia.</p>
        @endif
    </div>
</div>

<!-- Loading Overlay 
<div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-80 hidden items-center justify-center z-50">
    <div class="text-center">
        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mb-4"></div>
        <p class="text-gray-600">Memuat data...</p>
    </div>
</div>   -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing slide pagination...');
    
    const tableContent = document.getElementById('tableContent');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const slideLinks = document.querySelectorAll('.slide-link');
    
    // Fungsi untuk menampilkan loading
    function showLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.remove('hidden');
            loadingOverlay.classList.add('flex');
        }
    }
    
    // Fungsi untuk menyembunyikan loading
    function hideLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.add('hidden');
            loadingOverlay.classList.remove('flex');
        }
    }
    
    // Fungsi untuk animasi slide out
    function slideOut(direction, callback) {
        if (!tableContent) return;
        
        if (direction === 'next') {
            tableContent.style.transform = 'translateX(-100%)';
        } else {
            tableContent.style.transform = 'translateX(100%)';
        }
        tableContent.style.opacity = '0';
        
        setTimeout(() => {
            if (callback) callback();
        }, 200);
    }
    
    // Fungsi untuk animasi slide in
    function slideIn(direction) {
        if (!tableContent) return;
        
        // Reset transform dan opacity
        tableContent.style.transform = direction === 'next' ? 'translateX(100%)' : 'translateX(-100%)';
        tableContent.style.opacity = '0';
        
        // Trigger slide in animation
        setTimeout(() => {
            tableContent.style.transform = 'translateX(0)';
            tableContent.style.opacity = '1';
        }, 50);
        
        // Clean up
        setTimeout(() => {
            tableContent.style.transform = '';
            tableContent.style.opacity = '';
        }, 450);
    }
    
    // Event listener untuk pagination links
    slideLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const url = this.getAttribute('href');
            const direction = this.getAttribute('data-direction');
            
            if (!url) return;
            
            console.log(`Navigating to: ${url} with direction: ${direction}`);
            
            // Determine slide direction
            let slideDirection = 'next';
            if (direction === 'prev') {
                slideDirection = 'prev';
            } else if (direction === 'auto') {
                const currentPage = {{ $deteksis->currentPage() }};
                const targetPage = parseInt(this.textContent);
                slideDirection = targetPage > currentPage ? 'next' : 'prev';
            }
            
            // Tampilkan loading dan mulai animasi slide out
            showLoading();
            slideOut(slideDirection, () => {
                window.location.href = url;
            });
        });
        
        // Add ripple effect
        link.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            ripple.style.cssText = `
                position: absolute;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(59, 130, 246, 0.3);
                transform: translate(-50%, -50%);
                left: ${x}px;
                top: ${y}px;
                transition: width 0.6s, height 0.6s;
                pointer-events: none;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.style.width = '200px';
                ripple.style.height = '200px';
            }, 10);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Animasi slide in saat halaman dimuat
    if (tableContent) {
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page');
        
        if (page && page !== '1') {
            slideIn('next');
        }
    }
    
    // Sembunyikan loading saat halaman selesai dimuat
    window.addEventListener('load', function() {
        hideLoading();
    });
    
    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(e) {
        showLoading();
        setTimeout(() => {
            window.location.reload();
        }, 200);
    });
    
    console.log('Slide pagination initialized successfully');
});

// Fungsi global untuk debugging
window.debugSlide = function() {
    console.log('Current page:', {{ $deteksis->currentPage() }});
    console.log('Total pages:', {{ $deteksis->lastPage() }});
    console.log('Total items:', {{ $deteksis->total() }});
    return 'Debug info logged to console';
};

</script>
@endsection