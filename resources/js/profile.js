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
                if (e.target === modal) modal.classList.add('hidden');
            });
        }

        // Auto buka jika ada error
        const hasErrors = document.body.dataset.hasErrors === "true";
        if (hasErrors && modal) {
            modal.classList.remove('hidden');
        }

        // Auto hide popup sukses
        const successPopup = document.getElementById('successPopup');
        if (successPopup) {
            setTimeout(() => {
                successPopup.style.opacity = '0';
                setTimeout(() => successPopup.remove(), 300);
            }, 3000);
        }
    });
}
