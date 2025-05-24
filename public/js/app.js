// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle untuk semua halaman
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    }

    // Gallery Modal (untuk halaman galeri dan artikel)
    setupGalleryModal();

    // Image Upload dan Deteksi Penyakit (untuk halaman deteksi)
    setupDetectionPage();

    // Product Card Hover Effects (untuk halaman produk)
    setupProductHoverEffects();
});

// Fungsi untuk Gallery Modal
function setupGalleryModal() {
    // Buka modal galeri
    window.openModal = function(src, caption) {
        const modal = document.getElementById('gallery-modal');
        const modalImg = document.getElementById('modal-image');
        const captionText = document.getElementById('image-caption');
        
        if (modal && modalImg && captionText) {
            modalImg.src = src;
            captionText.textContent = caption || '';
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    // Tutup modal galeri
    window.closeModal = function() {
        const modal = document.getElementById('gallery-modal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    };

    // Event listener untuk modal galeri
    const modal = document.getElementById('gallery-modal');
    if (modal) {
        // Tutup saat klik di luar gambar
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Tutup dengan tombol ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    }
}

// Fungsi untuk Halaman Deteksi Penyakit
function setupDetectionPage() {
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('imageInput');
    const uploadText = document.getElementById('uploadText');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('previewImage');
    const hasilDeteksi = document.getElementById('hasilDeteksi');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const btnDeteksi = document.getElementById('btnDeteksi');
    const deleteImageBtn = document.getElementById('deleteImageBtn');

    if (!dropzone) return;

    // Handle click on dropzone
    dropzone.addEventListener('click', () => {
        imageInput.click();
    });

    // Handle drag over
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('active', 'border-green-500');
    });

    // Handle drag leave
    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('active', 'border-green-500');
    });

    // Handle drop
    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('active', 'border-green-500');
        
        if (e.dataTransfer.files.length) {
            imageInput.files = e.dataTransfer.files;
            handleImageUpload();
        }
    });

    // Handle file input change
    imageInput.addEventListener('change', handleImageUpload);

    // Handle delete image button
    if (deleteImageBtn) {
        deleteImageBtn.addEventListener('click', resetImageUpload);
    }

    // Handle detection button
    if (btnDeteksi) {
        btnDeteksi.addEventListener('click', detectDisease);
    }

    function resetImageUpload() {
        // Reset file input
        imageInput.value = '';
        
        // Reset UI
        uploadText.textContent = 'Seret & Lepas Gambar di sini\natau Klik untuk Upload';
        dropzone.classList.remove('hidden');
        imagePreviewContainer.classList.add('hidden');
        previewImage.src = '#';
        
        // Reset detection results
        if (hasilDeteksi) {
            hasilDeteksi.innerHTML = '<div class="text-gray-500 h-full flex items-center justify-center"><p>Hasil deteksi akan muncul di sini setelah Anda mengupload gambar</p></div>';
        }
    }

    function handleImageUpload() {
        if (imageInput.files && imageInput.files[0]) {
            const file = imageInput.files[0];
            
            // Validate file type and size
            if (!file.type.match('image.*')) {
                alert('Hanya file gambar yang diperbolehkan (JPG, PNG)');
                return;
            }
            
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file maksimal 5MB');
                return;
            }
            
            // Update UI
            uploadText.textContent = file.name;
            dropzone.classList.add('hidden');
            imagePreviewContainer.classList.remove('hidden');
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    async function detectDisease() {
        if (!imageInput.files || !imageInput.files[0]) {
            if (hasilDeteksi) {
                hasilDeteksi.innerHTML = '<p class="text-red-500 text-center">Silakan upload gambar terlebih dahulu</p>';
            }
            return;
        }
        
        const formData = new FormData();
        formData.append('file', imageInput.files[0]);
        
        try {
            // Show loading spinner
            if (loadingSpinner) loadingSpinner.style.display = 'block';
            if (hasilDeteksi) {
                hasilDeteksi.innerHTML = '<div class="text-gray-500 h-full flex items-center justify-center"><p>Memproses gambar...</p></div>';
            }
            
            // Send to backend API
            const response = await fetch('/api/detect', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const result = await response.json();
            
            // Display results
            if (hasilDeteksi) {
                if (result.error) {
                    hasilDeteksi.innerHTML = `<div class="text-red-500 text-center">Error: ${result.error}</div>`;
                } else if (result.status === "Healthy") {
                    hasilDeteksi.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                                <h3 class="font-bold text-green-700">✅ Daun terdeteksi SEHAT</h3>
                                <p class="mt-2">🌿 Kualitas: ${result.kualitas || 'Tidak diketahui'}</p>
                                <p class="mt-1">🔍 Tingkat Akurasi: ${(result.confidence * 100).toFixed(1)}%</p>
                            </div>
                            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                                <h3 class="font-bold text-blue-700">Tips Perawatan:</h3>
                                <ul class="list-disc pl-5 mt-1 space-y-1">
                                    <li>Lanjutkan perawatan rutin</li>
                                    <li>Pantau kondisi daun secara berkala</li>
                                    <li>Jaga kelembaban tanah yang optimal</li>
                                </ul>
                            </div>
                        </div>
                    `;
                } else if (result.status === "Sick") {
                    hasilDeteksi.innerHTML = `
                        <div class="space-y-4">
                            <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                                <h3 class="font-bold text-red-700">❗ Deteksi Penyakit</h3>
                                <p class="mt-2">🦠 ${result.penyakit || 'Penyakit tidak diketahui'}</p>
                                <p class="mt-1">🔍 Tingkat Akurasi: ${(result.confidence * 100).toFixed(1)}%</p>
                            </div>
                            <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                                <h3 class="font-bold text-yellow-700">Deskripsi:</h3>
                                <p class="mt-1">${result.deskripsi || 'Tidak ada deskripsi tersedia'}</p>
                            </div>
                            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                                <h3 class="font-bold text-blue-700">Solusi Penanganan:</h3>
                                <ul class="list-disc pl-5 mt-1 space-y-1">
                                    <li>Gunakan fungisida yang sesuai</li>
                                    <li>Pangkas bagian yang terinfeksi</li>
                                    <li>Perbaiki drainase dan sirkulasi udara</li>
                                    <li>Pantau perkembangan tanaman</li>
                                </ul>
                            </div>
                        </div>
                    `;
                } else {
                    hasilDeteksi.innerHTML = `
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <h3 class="font-bold text-gray-700">⚠️ Hasil Tidak Dikenali</h3>
                            <p class="mt-2">Format respons tidak valid dari server</p>
                        </div>
                    `;
                }
            }
            
        } catch (error) {
            console.error('Error:', error);
            if (hasilDeteksi) {
                hasilDeteksi.innerHTML = `
                    <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                        <h3 class="font-bold text-red-700">⚠️ Error</h3>
                        <p class="mt-2">Gagal melakukan deteksi. Pastikan:</p>
                        <ul class="list-disc pl-5 mt-1 space-y-1">
                            <li>API server sedang berjalan</li>
                            <li>Gambar yang diupload jelas</li>
                            <li>Koneksi internet stabil</li>
                        </ul>
                    </div>
                `;
            }
        } finally {
            if (loadingSpinner) loadingSpinner.style.display = 'none';
        }
    }
}

// Fungsi untuk efek hover pada produk
function setupProductHoverEffects() {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
            
            const image = this.querySelector('.product-image');
            if (image) {
                image.style.transform = 'scale(1.05)';
            }
            
            const priceTag = this.querySelector('.price-tag');
            if (priceTag) {
                priceTag.style.color = 'var(--primary)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
            
            const image = this.querySelector('.product-image');
            if (image) {
                image.style.transform = '';
            }
            
            const priceTag = this.querySelector('.price-tag');
            if (priceTag) {
                priceTag.style.color = '';
            }
        });
    });
}

// Fungsi untuk inisialisasi komponen yang mungkin ada di berbagai halaman
function initComponents() {
    // Artikel card hover effects
    const articleCards = document.querySelectorAll('.article-card');
    articleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });

    // Gallery item hover effects
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.03)';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
}

// Panggil fungsi inisialisasi saat DOM siap
document.addEventListener('DOMContentLoaded', initComponents);