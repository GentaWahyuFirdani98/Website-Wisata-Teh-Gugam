@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Upload Foto ke Galeri</h1>

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Foto</label>
            <input type="text" name="judul" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Upload Foto</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                <div class="dropzone" id="dropzone">
                    <input type="file" name="foto" id="fotoInput" class="hidden" required>
                    <label for="fotoInput" class="cursor-pointer">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Klik atau drop file di sini</p>
                            <p class="text-sm text-gray-400 mt-1">Format: JPG/PNG (Max 2MB)</p>
                        </div>
                    </label>
                </div>
                <div id="preview" class="mt-4 hidden">
                    <img id="previewImage" class="max-h-48 mx-auto rounded-lg">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-upload mr-2"></i> Upload Foto
            </button>
        </div>
    </form>
</div>

<script>
    // Preview image sebelum upload
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('preview').classList.remove('hidden');
                document.getElementById('previewImage').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag and drop functionality
    const dropzone = document.getElementById('dropzone');
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropzone.classList.add('border-green-500', 'bg-green-50');
    }

    function unhighlight() {
        dropzone.classList.remove('border-green-500', 'bg-green-50');
    }

    dropzone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        document.getElementById('fotoInput').files = files;
        
        // Trigger change event
        const event = new Event('change');
        document.getElementById('fotoInput').dispatchEvent(event);
    }
</script>

<style>
    .dropzone {
        transition: all 0.3s ease;
    }
</style>
@endsection