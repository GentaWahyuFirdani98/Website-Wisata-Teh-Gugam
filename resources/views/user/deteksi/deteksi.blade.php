@extends('layouts.app')

@section('title', 'Deteksi Penyakit')


@section('content')
<!--
@guest
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Akses Terbatas
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Anda harus login terlebih dahulu untuk mengakses halaman deteksi penyakit.
            </p>
        </div>
        <div class="mt-8 space-y-6">
            <div class="flex items-center justify-center space-x-4">
                <a href="{{ route('login') }}" 
                   class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                   class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-green-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 border-green-600">
                    Register
                </a>
            </div>
        </div>
    </div>
</div>
@endguest
-->

<!-- Hero Section -->
<section class="hero-section h-48 md:h-64 flex items-center justify-center">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white">Deteksi Penyakit Daun Teh</h1>
        <p class="text-white mt-2">Unggah gambar daun teh untuk mendeteksi penyakit</p>
    </div>
</section>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 md:px-6 py-8 md:py-12">
    <div class="flex flex-col md:flex-row gap-6 md:gap-8 w-full max-w-6xl mx-auto">
        
        <!-- Upload Gambar Section -->
        <div class="flex-1">
            <div class="bg-white rounded-xl shadow-md p-6 h-full">
                <h2 class="text-xl md:text-2xl font-bold mb-4 text-green-700">Upload Gambar</h2>
                @if(session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                @endif
                @if(session('gambar'))
    <div class="mt-4 text-center">
        <p class="font-medium mb-2">📷 Gambar dari Kamera:</p>
        <img src="{{ asset('storage/deteksi/' . session('gambar')) }}" alt="Gambar Deteksi"
             class="w-full max-w-md mx-auto rounded shadow">
    </div>
@endif


                <div id="dropzone" class="upload-area w-full h-64 border-2 border-dashed border-gray-300 rounded-lg p-6 flex flex-col items-center justify-center cursor-pointer">
                    <input type="file" id="imageInput" class="hidden" accept="image/*">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p id="uploadText" class="text-gray-500 text-center">Seret & Lepas Gambar di sini<br>atau Klik untuk Upload</p>
                    <p class="text-gray-400 text-sm mt-3">Format: JPG, PNG (Maks. 5MB)</p>
                </div>
                <div id="imagePreviewContainer" class="mt-4 hidden">
                    <div class="relative">
                        <img id="previewImage" src="#" alt="Preview Gambar" class="max-h-48 mx-auto rounded-lg">
                        <button id="deleteImageBtn" class="delete-btn absolute top-0 right-0 bg-red-500 text-white rounded-full p-2 m-2 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- langkah- langkah -->
        <div>
            
        </div>

        <!-- Hasil Deteksi Section -->
        <div class="flex-1">
            <div class="bg-white rounded-xl shadow-md p-6 h-full">
                <h2 class="text-xl md:text-2xl font-bold mb-4 text-green-700">Hasil Deteksi</h2>
                <div id="hasilDeteksi" class="result-box w-full h-64 border border-gray-200 rounded-lg p-6 overflow-y-auto">
                    <div class="text-gray-500 h-full flex items-center justify-center">
                        <p>Hasil deteksi akan muncul di sini setelah Anda mengupload gambar</p>
                    </div>
                </div>
                
                <div id="loadingSpinner" class="spinner"></div>
            </div>
        </div>
    </div>

    <!-- Tombol Deteksi -->
    <div class="text-center mt-8">
        <button id="btnDeteksi" class="detect-btn bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg text-lg">
            Deteksi Sekarang
        </button>
    </div>
</main>
@endsection

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("images/deteksi.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    
    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        border-top: 4px solid var(--primary);
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
        display: none;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush



@push('scripts')

<script>
    const kualitas_deskripsi = {
    "T1": "Kualitas terbaik. Daun masih sangat muda, berwarna hijau cerah, utuh, dan belum terbuka penuh. Cocok untuk teh premium dengan rasa dan aroma unggulan.",
    "T2": "Kualitas bagus. Daun muda yang mulai membuka sedikit. Masih layak untuk teh berkualitas tinggi dengan sedikit penurunan rasa dan aroma dibanding T1.",
    "T3": "Kualitas sedang. Daun sudah lebih terbuka dan usia sedikit lebih tua. Umumnya digunakan untuk produk teh standar atau campuran.",
    "T4": "Kualitas rendah. Daun tua, bisa berwarna kusam atau ada sedikit kerusakan. Biasanya digunakan untuk teh massal atau kebutuhan industri."
};

const fakta_teh = [
    "Semua jenis teh—hijau, hitam, putih, oolong—berasal dari satu tanaman yang sama: Camellia sinensis.",
    "Kualitas terbaik daun teh dipetik dari pucuk dan dua daun muda di bawahnya.",
    "Daun teh muda biasanya memiliki lebih banyak kafein dan antioksidan dibanding daun tua.",
    "Kondisi lingkungan seperti ketinggian, curah hujan, dan suhu sangat memengaruhi kualitas daun teh.",
    "Waktu terbaik untuk memetik daun teh adalah pagi hari saat embun masih menempel.",
    "Proses pengolahan teh (seperti pengeringan dan fermentasi) menentukan jenis dan rasa teh.",
    "Daun teh sehat memiliki warna hijau cerah dan tekstur yang utuh tanpa bercak.",
    "Jamur dan penyakit pada daun teh bisa menurunkan kualitas hasil panen secara signifikan.",
    "Teh mengandung L-theanine, zat alami yang membantu meningkatkan fokus dan ketenangan.",
    "Pemrosesan yang salah, seperti pemetikan kasar atau penyimpanan lembap, bisa merusak mutu daun teh."
];

    // Image Upload Functionality
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('imageInput');
    const uploadText = document.getElementById('uploadText');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('previewImage');
    const hasilDeteksi = document.getElementById('hasilDeteksi');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const btnDeteksi = document.getElementById('btnDeteksi');
    const deleteImageBtn = document.getElementById('deleteImageBtn');

    // Handle click on dropzone
    // dropzone.addEventListener('click', () => {
    //     imageInput.click();
    // });
    

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
    deleteImageBtn.addEventListener('click', resetImageUpload);

    function resetImageUpload() {
        // Reset file input
        imageInput.value = '';
        
        // Reset UI
        uploadText.textContent = 'Seret & Lepas Gambar di sini\natau Klik untuk Upload';
        dropzone.classList.remove('hidden');
        imagePreviewContainer.classList.add('hidden');
        previewImage.src = '#';
        
        // Reset detection results
        hasilDeteksi.innerHTML = '<div class="text-gray-500 h-full flex items-center justify-center"><p>Hasil deteksi akan muncul di sini setelah Anda mengupload gambar</p></div>';
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

    // Handle detection button click
    btnDeteksi.addEventListener('click', async () => {
        if (!imageInput.files || !imageInput.files[0]) {
            hasilDeteksi.innerHTML = '<p class="text-red-500 text-center">Silakan upload gambar terlebih dahulu</p>';
            return;
        }
        
        const formData = new FormData();
        formData.append('file', imageInput.files[0]);
        
        try {
            // Show loading spinner
            loadingSpinner.style.display = 'block';
            hasilDeteksi.innerHTML = '<div class="text-gray-500 h-full flex items-center justify-center"><p>Memproses gambar...</p></div>';
            
            // Simulate API call (replace with actual API call)
            const response = await fetch('http://127.0.0.1:8000/predict', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            displayDetectionResult(result);
            loadingSpinner.style.display = 'none';

            
        } catch (error) {
            console.error('Error:', error);
            hasilDeteksi.innerHTML = `
                <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                    <h3 class="font-bold text-red-700">⚠ Error</h3>
                    <p class="mt-2">Gagal melakukan deteksi. Pastikan:</p>
                    <ul class="list-disc pl-5 mt-1 space-y-1">
                        <li>Gambar yang diupload jelas</li>
                        <li>Koneksi internet stabil</li>
                    </ul>
                </div>
            `;
            loadingSpinner.style.display = 'none';
        }
    });
function displayDetectionResult(result) {
    const faktaRandom = fakta_teh[Math.floor(Math.random() * fakta_teh.length)];
    const deskripsiKualitas = kualitas_deskripsi[result.kualitas] || '';

    if (result.error) {
        hasilDeteksi.innerHTML = `
            <div class="text-red-500 text-center">
                ⚠ Error: ${result.error}
            </div>`;
        return;
    }

    if (result.status === "Unknown") {
        hasilDeteksi.innerHTML = `
            <div class="p-4 bg-yellow-100 border border-yellow-300 rounded">
                <h3 class="text-yellow-700 font-bold">Tidak Terdeteksi</h3>
                <p class="mt-2">${result.message || 'Gambar tidak dikenali sebagai daun teh.'}</p>
            </div>
        `;
        return;
    }

    if (result.status === "Healthy") {
        hasilDeteksi.innerHTML = `
            <div class="space-y-4">
                <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                    <h3 class="font-bold text-green-700">✅ Daun Sehat</h3>
                    <p class="mt-2">🌿 Kualitas: ${result.kualitas || 'Tidak diketahui'}</p>
                    <p class="mt-1">🔍 Akurasi: ${(result.confidence * 100).toFixed(1)}%</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="font-bold text-gray-700">📘 Penjelasan Kualitas:</h3>
                    <p class="mt-1">${deskripsiKualitas}</p>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <h3 class="font-bold text-blue-700">💡 Fakta Unik:</h3>
                    <p class="mt-1">${faktaRandom}</p>
                </div>
            </div>
        `;
        return;
    }

    if (result.status === "Sick") {
        hasilDeteksi.innerHTML = `
            <div class="space-y-4">
                <div class="p-4 bg-red-50 rounded-lg border border-red-200">
                    <h3 class="font-bold text-red-700">❗ Daun Sakit</h3>
                    <p class="mt-2">🦠 Penyakit: ${result.penyakit || 'Tidak diketahui'}</p>
                    <p class="mt-1">🔍 Akurasi: ${(result.confidence * 100).toFixed(1)}%</p>
                </div>
                <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                    <h3 class="font-bold text-yellow-700">📝 Deskripsi Penyakit:</h3>
                    <p class="mt-1">${result.deskripsi || 'Tidak tersedia'}</p>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <h3 class="font-bold text-blue-700">💡 Fakta Unik:</h3>
                    <p class="mt-1">${faktaRandom}</p>
                </div>
            </div>
        `;
    }
}


</script>
@endpush
