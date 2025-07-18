<!-- Modern Footer -->
<footer class="relative bg-gradient-to-br from-emerald-900 via-green-800 to-teal-900 text-white overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 left-10 w-64 h-64 bg-emerald-400 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-green-400 rounded-full blur-3xl"></div>
  </div>

  <!-- Floating Tea Leaves -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-10 left-1/4 text-4xl opacity-20 animate-pulse" style="animation-delay: 0s;">🍃</div>
    <div class="absolute top-20 right-1/3 text-3xl opacity-15 animate-pulse" style="animation-delay: 2s;">🌿</div>
    <div class="absolute bottom-20 left-1/6 text-5xl opacity-10 animate-pulse" style="animation-delay: 4s;">🍃</div>
    <div class="absolute bottom-10 right-1/4 text-3xl opacity-20 animate-pulse" style="animation-delay: 6s;">🌱</div>
  </div>

  <div class="relative container mx-auto px-4 py-12">
    <div class="max-w-7xl mx-auto">
      <!-- Header Section -->
      <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-4">
          <span class="text-2xl">🌿</span>
        </div>
        <h3 class="text-2xl md:text-3xl font-bold mb-3">
          <span class="bg-gradient-to-r from-emerald-300 to-green-200 bg-clip-text text-transparent">
            Kebun Teh Gunung Gambir
          </span>
        </h3>
        <p class="text-emerald-100 max-w-2xl mx-auto leading-relaxed">
          Destinasi wisata alam yang menawarkan keindahan panorama perkebunan teh dan pengalaman wisata yang tak terlupakan
        </p>
      </div>

      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Quick Links -->
        <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300">
          <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-emerald-500 rounded-xl flex items-center justify-center mr-3">
              <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
              </svg>
            </div>
            <h4 class="text-lg font-bold text-white">Tautan Cepat</h4>
          </div>
          <ul class="space-y-3">
            <li><a href="{{ route('home') }}" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center group">
              <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
              Beranda
            </a></li>
            <li><a href="{{ route('about') }}" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center group">
              <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
              Tentang Kami
            </a></li>
            <li><a href="{{ route('galeri') }}" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center group">
              <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
              Galeri
            </a></li>
            <li><a href="{{ route('artikel') }}" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center group">
              <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
              Artikel
            </a></li>
            <li><a href="{{ route('produk') }}" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center group">
              <span class="w-2 h-2 bg-emerald-400 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
              Produk
            </a></li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300">
          <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-blue-500 rounded-xl flex items-center justify-center mr-3">
              <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <h4 class="text-lg font-bold text-white">Hubungi Kami</h4>
          </div>
          <div class="space-y-4">
            <div class="flex items-start">
              <svg class="w-5 h-5 text-emerald-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              </svg>
              <p class="text-emerald-200 text-sm leading-relaxed">
                Lanasan Rt 03, RW.023, Gelang, Kec. Sumberbaru, Jember, Jawa Timur
              </p>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
              <a href="tel:082333958479" class="text-emerald-200 hover:text-white transition-colors">082333958479</a>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
              </svg>
              <span class="text-emerald-200">@wisatagununggambir</span>
            </div>
          </div>
        </div>

        <!-- Operating Hours -->
        <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-6 border border-white/10 hover:bg-white/10 transition-all duration-300">
          <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-orange-500 rounded-xl flex items-center justify-center mr-3">
              <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h4 class="text-lg font-bold text-white">Jam Operasional</h4>
          </div>
          <div class="space-y-3">
            <div class="flex justify-between items-center">
              <span class="text-emerald-200">Setiap Hari</span>
              <span class="text-white font-semibold">Buka</span>
            </div>
            <div class="bg-white/10 rounded-xl p-3">
              <div class="text-center">
                <div class="text-xl font-bold text-white mb-1">06:00 - 15:00</div>
                <div class="text-emerald-200 text-sm">WIB</div>
              </div>
            </div>
            <div class="text-center">
              <span class="inline-flex items-center px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs font-medium">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                Buka Hari Ini
              </span>
            </div>
          </div>
        </div>


      </div>

      <!-- Bottom Section -->
      <div class="border-t border-white/20 pt-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="text-center md:text-left mb-4 md:mb-0">
            <p class="text-emerald-200 text-sm">
              © {{ date('Y') }} Kebun Teh Gunung Gambir. All rights reserved.
            </p>
            <p class="text-emerald-300 text-xs mt-1">
              Dikembangkan dengan ❤️ untuk wisata Indonesia
            </p>
          </div>

          <!-- Social Links -->
          <div class="flex items-center space-x-4">
            <span class="text-emerald-200 text-sm mr-2">Ikuti Kami:</span>
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.036 6.803c-2.871 0-5.197 2.325-5.197 5.196s2.326 5.196 5.197 5.196 5.196-2.325 5.196-5.196-2.325-5.196-5.196-5.196zm0 8.57c-1.862 0-3.374-1.512-3.374-3.374s1.512-3.374 3.374-3.374 3.374 1.512 3.374 3.374-1.512 3.374-3.374 3.374z"/>
                <path d="M17.343 6.477c0 .671-.544 1.215-1.215 1.215-.671 0-1.215-.544-1.215-1.215s.544-1.215 1.215-1.215c.671 0 1.215.544 1.215 1.215z"/>
                <path d="M12.036 2.163c-2.724 0-3.065.012-4.137.06-1.071.049-1.803.218-2.443.465-.662.257-1.224.602-1.784 1.162S2.85 5.174 2.593 5.836c-.247.64-.416 1.372-.465 2.443-.048 1.072-.06 1.413-.06 4.137s.012 3.065.06 4.137c.049 1.071.218 1.803.465 2.443.257.662.602 1.224 1.162 1.784s1.122.905 1.784 1.162c.64.247 1.372.416 2.443.465 1.072.048 1.413.06 4.137.06s3.065-.012 4.137-.06c1.071-.049 1.803-.218 2.443-.465.662-.257 1.224-.602 1.784-1.162s.905-1.122 1.162-1.784c.247-.64.416-1.372.465-2.443.048-1.072.06-1.413.06-4.137s-.012-3.065-.06-4.137c-.049-1.071-.218-1.803-.465-2.443-.257-.662-.602-1.224-1.162-1.784s-1.122-.905-1.784-1.162c-.64-.247-1.372-.416-2.443-.465-1.072-.048-1.413-.06-4.137-.06zm0 1.838c2.68 0 2.996.01 4.056.058.979.045 1.511.207 1.864.344.469.182.803.4 1.155.752.352.352.57.686.752 1.155.137.353.299.885.344 1.864.048 1.06.058 1.376.058 4.056s-.01 2.996-.058 4.056c-.045.979-.207 1.511-.344 1.864-.182.469-.4.803-.752 1.155-.352.352-.686.57-1.155.752-.353.137-.885.299-1.864.344-1.06.048-1.376.058-4.056.058s-2.996-.01-4.056-.058c-.979-.045-1.511-.207-1.864-.344-.469-.182-.803-.4-1.155-.752-.352-.352-.57-.686-.752-1.155-.137-.353-.299-.885-.344-1.864-.048-1.06-.058-1.376-.058-4.056s.01-2.996.058-4.056c.045-.979.207-1.511.344-1.864.182-.469.4-.803.752-1.155.352-.352.686-.57 1.155-.752.353-.137.885-.299 1.864-.344 1.06-.048 1.376-.058 4.056-.058z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<style>
/* Enhanced Footer Animations */
@keyframes pulse {
  0%, 100% {
    opacity: 0.2;
  }
  50% {
    opacity: 0.6;
  }
}

.animate-pulse {
  animation: pulse 3s ease-in-out infinite;
}

/* Smooth transitions for all interactive elements */
footer a, footer button {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  footer .grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }

  footer .bg-white\/5 {
    padding: 1rem;
  }

  footer .container {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }
}
</style>
