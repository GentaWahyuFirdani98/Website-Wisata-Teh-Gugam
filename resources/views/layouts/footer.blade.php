<footer class="bg-gray-800 text-white py-12">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-8">
        <h3 class="text-2xl font-bold mb-2">Gunung Gambir</h3>
        <p class="text-gray-300 max-w-md mx-auto">
          Kebun Teh Gunung Gambir, destinasi wisata alam yang menawarkan pengalaman keindahan perkebunan teh dan pemandangan alam yang memukau.
        </p>
      </div>

      <div class="grid md:grid-cols-2 gap-8 mb-8">
        <div class="text-center md:text-left">
          <h4 class="text-lg font-semibold mb-3">Tautan Cepat</h4>
          <ul class="space-y-2">
            <li><a href="{{ route('home') }}" class="footer-link text-gray-300 inline-block">Beranda</a></li>
            <li><a href="{{ route('about') }}" class="footer-link text-gray-300 inline-block">Tentang Kami</a></li>
            <li><a href="{{ route('galeri') }}" class="footer-link text-gray-300 inline-block">Galeri</a></li>
            <li><a href="{{ route('artikel') }}" class="footer-link text-gray-300 inline-block">Artikel</a></li>
            <li><a href="{{ route('produk') }}" class="footer-link text-gray-300 inline-block">Produk</a></li>
            <li><a href="{{ route('deteksi') }}" class="footer-link text-gray-300 inline-block">Deteksi Penyakit</a></li>
          </ul>
        </div>

        <div class="text-center md:text-left">
          <h4 class="text-lg font-semibold mb-3">Hubungi Kami</h4>
          <address class="text-gray-300 not-italic space-y-2">
            <p>Jl. Raya Gunung Gambir, Jember, Jawa Timur, Indonesia</p>
            <p>+62 123 4567 890</p>
            <p>info@kebuntehgambir.id</p>
          </address>
        </div>
      </div>

      <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
        <p>© {{ date('Y') }} Kebun Teh Gunung Gambir. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
