if (document.body.dataset.page === 'profile') {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('editNamaModal');
        const openBtn = document.getElementById('openEditModal');
        const closeBtn = document.getElementById('closeEditModal');

        // Buka modal
        if (openBtn) {
            openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        }

        // Tutup modal
        if (closeBtn) {
            closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
        }

        // Klik luar modal
        if (modal) {
            modal.addEventListener('click', (e) => {
                // Jangan lakukan apa-apa jika klik di luar modalContent
                const modalContent = document.getElementById('modalContent');
                if (!modalContent.contains(e.target)) {
                    e.stopPropagation();
                }
            });
        }
        
        // Auto buka jika ada error
        const hasErrors = document.body.dataset.hasErrors === "true";
        if (hasErrors && modal) {
            modal.classList.remove('hidden');
        }

        // Auto hide popup sukses yang sudah ada
        const successPopup = document.getElementById('successPopup');
        if (successPopup) {
            setTimeout(() => {
                successPopup.style.opacity = '0';
                setTimeout(() => successPopup.remove(), 300);
            }, 3000);
        }

        // ===== FUNGSI POP-UP PESAN SUKSES BARU =====
        
        // Fungsi untuk membuat dan menampilkan pop-up sukses
        function showSuccessPopup(message, type = 'success') {
            // Hapus pop-up yang sudah ada
            const existingPopup = document.querySelector('.success-popup');
            if (existingPopup) {
                existingPopup.remove();
            }

            // Tentukan warna berdasarkan type
            let bgColor = 'bg-green-500';
            let icon = '✓';
            
            if (type === 'info') {
                bgColor = 'bg-blue-500';
                icon = 'ℹ';
            } else if (type === 'warning') {
                bgColor = 'bg-yellow-500';
                icon = '⚠';
            }

            // Buat elemen pop-up
            const popup = document.createElement('div');
            popup.className = `success-popup fixed top-6 right-6 ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-all duration-300 ease-in-out max-w-sm`;
            
            popup.innerHTML = `
                <div class="flex items-center space-x-3">
                    <span class="text-lg font-semibold">${icon}</span>
                    <span class="text-sm">${message}</span>
                    <button class="ml-auto text-white hover:text-gray-200 transition-colors" onclick="this.parentElement.parentElement.remove()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;

            // Tambahkan ke body
            document.body.appendChild(popup);

            // Animasi masuk
            setTimeout(() => {
                popup.classList.remove('translate-x-full');
                popup.classList.add('translate-x-0');
            }, 10);

            // Auto hide setelah 4 detik
            setTimeout(() => {
                popup.classList.remove('translate-x-0');
                popup.classList.add('translate-x-full');
                setTimeout(() => {
                    if (popup.parentNode) {
                        popup.remove();
                    }
                }, 300);
            }, 4000);
        }

        // Deteksi pesan sukses dari server (Laravel session)
        const checkForSuccessMessages = () => {
            // Cek untuk pesan nama_updated
            if (document.body.dataset.namaUpdated) {
                showSuccessPopup('Data berhasil disimpan', 'success');
                // Hapus dataset agar tidak muncul lagi
                delete document.body.dataset.namaUpdated;
            }

            // Cek untuk pesan status (password updated)
            if (document.body.dataset.passwordUpdated) {
                showSuccessPopup('Data berhasil disimpan', 'success');
                delete document.body.dataset.passwordUpdated;
            }

            // Cek untuk pesan success umum
            if (document.body.dataset.successMessage) {
                showSuccessPopup(document.body.dataset.successMessage, 'success');
                delete document.body.dataset.successMessage;
            }
        };

        // Jalankan pengecekan pesan sukses
        checkForSuccessMessages();

        // ===== EVENT LISTENER UNTUK FORM SUBMIT =====
        
        // Handle form submit nama
        const namaForm = document.querySelector('form[action*="profile.update.nama"]');
        if (namaForm) {
            namaForm.addEventListener('submit', (e) => {
                // Tambahkan loading state
                const submitBtn = namaForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Menyimpan...';
                submitBtn.disabled = true;

                // Restore button setelah 3 detik (fallback)
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 3000);
            });
        }

        // Handle form submit password
        const passwordForm = document.querySelector('form[action*="profile.password"]');
        if (passwordForm) {
            passwordForm.addEventListener('submit', (e) => {
                // Tambahkan loading state
                const submitBtn = passwordForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Menyimpan...';
                submitBtn.disabled = true;

                // Reset form fields setelah submit
                setTimeout(() => {
                    passwordForm.querySelectorAll('input[type="password"]').forEach(input => {
                        input.value = '';
                    });
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 3000);
            });
        }

        // ===== FUNGSI HELPER UNTUK MANUAL TRIGGER =====
        
        // Fungsi global yang bisa dipanggil dari mana saja
        window.showProfileSuccess = function(message, type = 'success') {
            showSuccessPopup(message, type);
        };

        // Fungsi untuk menutup modal sekaligus menampilkan pesan sukses
        window.closeModalWithSuccess = function(message) {
            if (modal) {
                modal.classList.add('hidden');
            }
            setTimeout(() => {
                showSuccessPopup(message, 'success');
            }, 200);
        };
    });
}