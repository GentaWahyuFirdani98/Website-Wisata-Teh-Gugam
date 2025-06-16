<footer class="bg-gray-800 text-white py-6">
  <div class="container mx-auto px-4">
    <div class="max-w-5xl mx-auto">
      <div class="text-center mb-4">
        <h3 class="text-xl font-bold mb-1">Gunung Gambir</h3>
        <p class="text-gray-300 text-sm max-w-md mx-auto">
          Kebun Teh Gunung Gambir, destinasi wisata alam yang menawarkan keindahan alam dan pengalaman unik.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-4 mb-4">
        <!-- Tautan Cepat -->
        <div class="text-center md:text-left">
          <h4 class="text-base font-semibold mb-2">Tautan Cepat</h4>
          <ul class="space-y-1 text-sm">
            <li><a href="{{ route('home') }}" class="text-gray-300 inline-block">Beranda</a></li>
            <li><a href="{{ route('about') }}" class="text-gray-300 inline-block">Tentang Kami</a></li>
            <li><a href="{{ route('galeri') }}" class="text-gray-300 inline-block">Galeri</a></li>
            <li><a href="{{ route('artikel') }}" class="text-gray-300 inline-block">Artikel</a></li>
            <li><a href="{{ route('produk') }}" class="text-gray-300 inline-block">Produk</a></li>
          </ul>
        </div>

        <!-- Kontak -->
        <div class="text-center md:text-left">
          <h4 class="text-base font-semibold mb-2">Hubungi Kami</h4>
          <address class="text-gray-300 not-italic space-y-1 text-sm">
            <p>Lanasan Rt 03, RW.023, Gelang, kec. Sumberbaru, Jember, Jawa Timur</p>
            <p>082333958479</p>
            <p>@wisatagununggambir</p>
          </address>
        </div>

        <!-- Jam Buka -->
        <div class="text-center md:text-left">
          <h4 class="text-base font-semibold mb-2">Jam Buka</h4>
          <p class="text-gray-300 text-sm">Setiap Hari</p>
          <p class="text-gray-300 text-sm">06.00 – 15.00 WIB</p>
        </div>
      </div>

      <div class="border-t border-gray-700 pt-4 text-center text-gray-400 text-xs">
        <p>© {{ date('Y') }} Kebun Teh Gunung Gambir. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
