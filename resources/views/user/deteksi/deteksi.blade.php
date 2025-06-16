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
<main class="container mx-auto py-12 px-4 md:px-6">
    <div class="flex flex-col md:flex-row gap-8 max-w-6xl mx-auto">
        
        <!-- Upload -->
        <div class="w-full md:w-1/2">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-green-700 mb-4">Upload Gambar</h2>

                <div id="imagePreviewContainer" class="mb-4 hidden">
                    <div class="relative">
                        <img id="previewImage" src="#" class="rounded shadow max-h-48 mx-auto" alt="Preview">
                        <button id="deleteImageBtn" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 m-2 shadow">
                            &times;
                        </button>
                    </div>
                </div>

                <!-- Dropzone -->
                <div id="dropzone" class="upload-area border-2 border-dashed border-gray-300 p-6 rounded-lg flex flex-col items-center justify-center cursor-pointer {{ session('gambar') ? 'hidden' : '' }}">
                    <input type="file" id="imageInput" class="hidden" accept="image/*">
                    
                    <!-- ICON UPLOAD (SVG CLOUD) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    
                    <p id="uploadText" class="text-gray-500 text-center">Seret & Lepas Gambar di sini<br>atau Klik untuk Upload</p>
                    <p class="text-gray-400 text-sm mt-3">Format: JPG, PNG (Maks. 5MB)</p>
                </div>

                <div class="text-center mt-6">
                    <button id="btnDeteksi" type="button" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Deteksi Sekarang
                    </button>
                </div>

                <div class="text-center mt-4">
                    <button id="startRealtime" 
                        class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-xl shadow transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 4h.01M5 12h.01M5 16h.01M5 8h.01M9 12h.01M9 16h.01M9 8h.01M13 16h.01M13 8h.01M17 12h.01" />
                        </svg>
                        Aktifkan Kamera Realtime
                    </button>
                </div>

                <div class="fixed bottom-6 right-6 z-50">
                    <input type="file"
                        accept="image/*"
                        capture="environment"
                        id="cameraFromDeteksi"
                        style="display: none;">

                    <a href="#" onclick="document.getElementById('cameraFromDeteksi').click(); return false;"
                    class="inline-block bg-white border rounded-full p-3 shadow-md hover:shadow-lg transition">
                        <img src="{{ asset('images/camera.png') }}" alt="Kamera"
                            class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </a>
                </div>

            </div>
        </div>

        <!-- Hasil Deteksi -->
        <div class="w-full md:w-1/2">
            <div class="bg-white p-6 rounded-xl shadow-md h-full">
                <h2 class="text-xl font-bold text-green-700 mb-4">Hasil Deteksi</h2>
                <div id="hasilDeteksi" class="h-64 overflow-y-auto border border-gray-200 rounded p-4 text-sm text-gray-700 space-y-4">
                    <p class="text-gray-500 text-center">Hasil deteksi akan muncul di sini</p>
                </div>
                <div id="loadingSpinner" class="spinner hidden"></div>
            </div>
        </div>

        <!-- Realtime Detection Camera -->
        <div id="realtimeContainer" class="mt-8 hidden flex flex-col items-center">
            <div class="relative" style="width: 640px; height: 480px;">
                <video id="liveCamera" autoplay playsinline class="w-full rounded shadow mb-4" width="640" height="480"></video>
                <canvas id="boundingCanvas" width="640" height="480"
                    class="absolute top-0 left-0 z-10 pointer-events-none hidden">
                </canvas>
            </div>
            <p id="realtimeInfo" class="text-sm text-gray-500 mt-2">Kamera realtime sedang berjalan...</p>
            <button id="closeCamera" 
                class="mt-4 inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-xl shadow hidden transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
                Tutup Kamera
            </button>
        </div>

    </div>


    <!-- Riwayat Deteksi -->
            
<!-- Riwayat Deteksi -->
<h2 class="text-xl md:text-2xl font-bold text-green-700 mb-5 mt-10">Riwayat Deteksi</h2>
<div class="overflow-x-auto">
    <table class="min-w-full text-left text-sm border rounded-lg overflow-hidden">
        <thead class="bg-green-100 text-green-700 font-semibold">
            <tr>
                <th class="px-4 py-2 border-b">No</th>
                <th class="px-4 py-2 border-b">Waktu</th>
                <th class="px-4 py-2 border-b">Status Kesehatan</th>
                <th class="px-4 py-2 border-b">Hasil Deteksi</th>
                <th class="px-4 py-2 border-b">Deskripsi</th>
                <th class="px-4 py-2 border-b">Akurasi</th>
                <th class="px-4 py-2 border-b">Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayat as $i => $data)
            <tr class="{{ $i >= 10 ? 'hidden more-row' : '' }}">
                <td class="px-4 py-2 border-b">{{ $i + 1 }}</td>
                <td class="px-4 py-2 border-b">{{ $data->created_at->format('d-m-Y H:i') }}</td>

                <td class="px-4 py-2 border-b">
                    @if ($data->jenisPenyakit->status_kesehatan === 'sehat')
                        <span class="text-green-600 font-semibold">Sehat</span>
                    @else
                        <span class="text-red-600 font-semibold">Sakit</span>
                    @endif
                </td>

                <td class="px-4 py-2 border-b">{{ $data->jenisPenyakit->nama_penyakit ?? '-' }}</td>
                <td class="px-4 py-2 border-b">{{ $data->jenisPenyakit->deskripsi ?? '-' }}</td>
                <td class="px-4 py-2 border-b">{{ number_format($data->confidence * 100, 1) }}%</td>

                <td class="px-4 py-2 border-b">
                    <img src="{{ asset('storage/deteksi/' . $data->foto_daun) }}" class="h-12 w-auto rounded shadow" alt="Hasil">
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-500">Belum ada riwayat deteksi</td>
                </tr>
            @endforelse


        </tbody>
    </table>
    @if ($riwayat->count() > 10)
    <div class="text-center mt-4">
        <button id="btnLihatSelengkapnya" class="text-green-700 hover:underline font-semibold">
            Lihat Selengkapnya
        </button>
    </div>
@endif

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
@if(session('gambar'))
<script>
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
        document.getElementById('previewImage').src = "{{ asset('storage/deteksi/' . session('gambar')) }}";
        document.getElementById('dropzone').classList.add('hidden');
    });
</script>
@endif

<script>
let video = document.getElementById('liveCamera');
let canvas = document.getElementById('boundingCanvas');
let context = canvas.getContext('2d');
let intervalId = null;

document.getElementById('startRealtime').addEventListener('click', async () => {
    document.getElementById('realtimeContainer').classList.remove('hidden');
    document.getElementById('closeCamera').classList.remove('hidden');

    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;

        intervalId = setInterval(() => {
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = video.videoWidth;
            tempCanvas.height = video.videoHeight;
            const tempCtx = tempCanvas.getContext('2d');
            tempCtx.drawImage(video, 0, 0);

            tempCanvas.toBlob(async (blob) => {
                const formData = new FormData();
                formData.append('file', blob, 'frame.jpg');

                try {
                    const res = await fetch('http://127.0.0.1:8000/predict', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await res.json();
                    tampilkanHasilRealtime(result);
                } catch (err) {
                    console.warn('Gagal mengirim ke API:', err);
                }
            }, 'image/jpeg');
        }, 2000);
    } catch (err) {
        alert("Tidak dapat mengakses kamera.");
        console.error(err);
    }
});

document.getElementById('closeCamera').addEventListener('click', () => {
    clearInterval(intervalId);
    document.getElementById('realtimeContainer').classList.add('hidden');
    document.getElementById('closeCamera').classList.add('hidden');

    const stream = video.srcObject;
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    video.srcObject = null;
    context.clearRect(0, 0, canvas.width, canvas.height);
});

function tampilkanHasilRealtime(result) {
    const canvas = document.getElementById('boundingCanvas');
    const video = document.getElementById('liveCamera');
    const ctx = canvas.getContext('2d');

    // Pastikan canvas terlihat
    canvas.classList.remove('hidden');

    // Ukuran tetap 640x480
    canvas.width = 640;
    canvas.height = 480;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (
        result &&
        result.bounding_box &&
        (result.status === 'Healthy' || result.status === 'Sick') &&
        result.confidence > 0.3
    ) {
        const scaleX = canvas.width / video.videoWidth;
        const scaleY = canvas.height / video.videoHeight;

        const { x, y, width, height } = result.bounding_box;

        ctx.strokeStyle = result.status === 'Healthy' ? 'green' : 'red';
        ctx.lineWidth = 3;
        ctx.strokeRect(x * scaleX, y * scaleY, width * scaleX, height * scaleY);

        // Label di dalam box
        const label = result.kualitas || result.penyakit || result.status;
        ctx.fillStyle = 'black';
        ctx.font = 'bold 16px sans-serif';
        ctx.fillText(
            `${label} (${(result.confidence * 100).toFixed(1)}%)`,
            x * scaleX + 5,
            y * scaleY + 20
        );
    }
}



//MAIN

   document.addEventListener('DOMContentLoaded', function () {
    // Ambil data dari localStorage jika ada
    const preview = localStorage.getItem('previewImage');
    const namaFile = localStorage.getItem('imageName');

    if (preview && namaFile) {
        const previewImg = document.getElementById('previewImage');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const dropzone = document.getElementById('dropzone');
        const imageInput = document.getElementById('imageInput');

        // Tampilkan preview gambar
        previewImg.src = preview;
        imagePreviewContainer.classList.remove('hidden');
        dropzone.classList.add('hidden');

        // Buat File object dari blob
        fetch(preview)
            .then(res => res.blob())
            .then(blob => {
                const file = new File([blob], namaFile || 'kamera.jpg', { type: blob.type });

                // Masukkan file ke dalam input[type=file]
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;

                // Trigger event change untuk proses deteksi jika perlu
                const event = new Event('change');
                imageInput.dispatchEvent(event);
            })
            .catch(err => {
                console.error('Gagal memuat gambar dari localStorage:', err);
                localStorage.removeItem('previewImage');
                localStorage.removeItem('imageName');
            });

        // Hapus data setelah diproses
        localStorage.removeItem('previewImage');
        localStorage.removeItem('imageName');
    }
});


    document.getElementById('cameraFromDeteksi')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        // Tampilkan preview
        const previewImg = document.getElementById('previewImage');
        previewImg.src = event.target.result;
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
        document.getElementById('dropzone').classList.add('hidden');

        // Simpan file ke input utama agar bisa dideteksi
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('imageInput').files = dataTransfer.files;

        // Jalankan deteksi otomatis
        // document.getElementById('btnDeteksi').click();
    };
    reader.readAsDataURL(file);
    });



    const btn = document.getElementById('btnLihatSelengkapnya');
    if (btn) {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.more-row').forEach(row => row.classList.remove('hidden'));
            btn.classList.add('hidden');
        });
    }



    // Image Upload Functionality
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('imageInput');
        dropzone.addEventListener('click', () => { imageInput.click();});
    const uploadText = document.getElementById('uploadText');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('previewImage');
    const hasilDeteksi = document.getElementById('hasilDeteksi');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const btnDeteksi = document.getElementById('btnDeteksi');
    const deleteImageBtn = document.getElementById('deleteImageBtn');

    

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
           dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('active', 'border-green-500');

            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;

                // ⛳ WAJIB: panggil fungsi ini untuk proses preview & validasi
                handleImageUpload();
            }
        });
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
    document.getElementById('btnDeteksi').addEventListener('click', async () => {
    const input = document.getElementById('imageInput');
    if (!input.files.length) {
        hasilDeteksi.innerHTML = '<p class="text-red-500">Silakan upload gambar terlebih dahulu.</p>';
        return;
    }

    const file = input.files[0];
    const formData = new FormData();
    formData.append('gambar', file);

    try {
        // 1. Upload file ke Laravel dulu
        const uploadRes = await fetch('/upload-gambar', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        const uploadData = await uploadRes.json();
        const namaFile = uploadData.filename;

        // 2. Kirim file asli ke FastAPI untuk diproses
        const fastApiData = new FormData();
        fastApiData.append('file', file);
        try {
        const res = await fetch('http://127.0.0.1:8000/predict', {
            method: 'POST',
            body: fastApiData
        });

        // Cek kalau response gagal (status 500, 404, dll)
        if (!res.ok) {
            throw new Error(`Server mengembalikan status ${res.status}`);
        }

        const result = await res.json();
        tampilkanHasil(result);
        simpanKeDatabase(namaFile, result); // hanya jika tidak error
        } catch (error) {
            console.error('Gagal memproses deteksi dari FastAPI:', error);
            hasilDeteksi.innerHTML = `
                <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded relative" role="alert">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-1.414 1.414A9 9 0 006.05 17.95l-1.414 1.414M12 9v2m0 4h.01" />
                        </svg>
                        <strong class="font-semibold">Gagal menghubungi server deteksi!</strong>
                    </div>
                    <div class="mt-2 text-sm">
                        Pastikan server FastAPI aktif
                    </div>
                </div>
            `;
        }

        if (result.error) {
            hasilDeteksi.innerHTML = `<p class="text-red-500">${result.error}</p>`;
        } else {
            tampilkanHasil(result);
            simpanKeDatabase(namaFile, result); // ← kirim filename sebenarnya
        }

    } catch (error) {
        console.error('Error:', error);
    }
});



function tampilkanHasil(result) {
    const hasilDeteksi = document.getElementById('hasilDeteksi');

    if (result.error) {
        hasilDeteksi.innerHTML = `<div class="text-red-500 text-center">${result.error}</div>`;
        return;
    }

    const fakta = [
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

    const kualitas_deskripsi = {
    "T1": "Kualitas terbaik. Daun masih sangat muda, berwarna hijau cerah, utuh, dan belum terbuka penuh. Cocok untuk teh premium dengan rasa dan aroma unggulan.",
    "T2": "Kualitas bagus. Daun muda yang mulai membuka sedikit. Masih layak untuk teh berkualitas tinggi dengan sedikit penurunan rasa dan aroma dibanding T1.",
    "T3": "Kualitas sedang. Daun sudah lebih terbuka dan usia sedikit lebih tua. Umumnya digunakan untuk produk teh standar atau campuran.",
    "T4": "Kualitas rendah. Daun tua, bisa berwarna kusam atau ada sedikit kerusakan. Biasanya digunakan untuk teh massal atau kebutuhan industri."
    };

     let html = '';
    if (result.status === 'Healthy') {
        html = `
        <div class="space-y-4 text-black font-medium">

        <!-- Kartu Kesehatan -->
        <div class="bg-green-100 border border-green-200 rounded-xl p-4 shadow">
            <h3 class="font-bold text-green-700 flex items-center mb-2">
                ✅ Daun Sehat
            </h3>
            <p class="mb-1">🌿 <strong>Kualitas:</strong> ${result.kualitas}</p>
            <p>🔍 <strong>Akurasi:</strong> ${(result.confidence * 100).toFixed(1)}%</p>
        </div>

        <!-- Kartu Deskripsi Kualitas -->
        <div class="bg-gray-100 border border-gray-300 rounded-xl p-4 shadow">
            <h4 class="font-semibold  text-blue-700 flex items-center mb-2">
                📘 Penjelasan Kualitas
            </h4>
            <p class="text-sm leading-relaxed">${kualitas_deskripsi[result.kualitas] || '-'}</p>
        </div>

        <!-- Kartu Fakta Unik -->
        <div class="bg-gray-100 border border-gray-300 rounded-xl p-4 shadow">
            <h4 class="font-semibold text-yellow-500  flex items-center mb-2">
                💡 Fakta Unik
            </h4>
            <p class="text-sm leading-relaxed">${fakta[Math.floor(Math.random() * fakta.length)]}</p>
        </div>

    </div>
    `;
    } 
    else if (result.status === 'Sick') {
        html = `
                <div class="space-y-4 text-black font-normal">
            <!-- Kartu Penyakit -->
            <div class="bg-red-100 border border-red-200 rounded-xl p-4 shadow">
                <h3 class="font-bold text-red-700 flex items-center mb-2 text-base">
                    ❗ Daun Sakit
                </h3>
                <p class="mb-1">🦠 <span class="font-semibold">Penyakit:</span> ${result.penyakit}</p>
                <p>🔍 <span class="font-semibold">Akurasi:</span> ${(result.confidence * 100).toFixed(1)}%</p>
            </div>

            <!-- Kartu Deskripsi -->
            <div class="bg-yellow-100 border border-yellow-200 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-yellow-700 flex items-center mb-2 text-base">
                    📝 Deskripsi Penyakit
                </h4>
                <p class="text-sm leading-relaxed">${result.deskripsi}</p>
            </div>

            <!-- Kartu Fakta Unik -->
            <div class="bg-blue-100 border border-blue-200 rounded-xl p-4 shadow">
                <h4 class="font-semibold text-blue-700 flex items-center mb-2 text-base">
                    💡 Fakta Unik
                </h4>
                <p class="text-sm leading-relaxed">${fakta[Math.floor(Math.random() * fakta.length)]}</p>
            </div>
        </div>

        `;
    } 
    else {
        html = `<div class="text-yellow-700">⚠ ${result.message}</div>`;
    }

    document.getElementById('hasilDeteksi').innerHTML = html;
}


function simpanKeDatabase(namaFile, result) {
    fetch('/rekam', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            gambar: namaFile,
            kualitas: result.kualitas || null,
            penyakit: result.penyakit || null,
            confidence: result.confidence || null,
            status: result.status,
            deskripsi: result.deskripsi || null,
        })
    })
    .then(res => res.json())
    .then(data => console.log("Disimpan ✅", data))
    .catch(err => console.error("Gagal simpan ❌", err));
}


</script>
@endpush
