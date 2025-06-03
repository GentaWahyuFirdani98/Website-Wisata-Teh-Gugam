document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editNamaModal');
    const openBtn = document.getElementById('openEditModal');
    const closeBtn = document.getElementById('closeEditModal');

    if (openBtn && closeBtn && modal) {
        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    }
});
