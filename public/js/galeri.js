document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');

    const galleryItems = Array.from(document.querySelectorAll('.gallery-img img'));
    const images = galleryItems.map(img => ({
        src: img.src,
        caption: img.alt
    }));

    let currentIndex = 0;

    window.openModal = function (index) {
        currentIndex = index;
        updateModal();
        modal.classList.remove('opacity-0', 'invisible');
        modal.classList.add('opacity-100', 'visible');
        document.body.style.overflow = 'hidden';
    }

    window.closeModal = function () {
        modal.classList.remove('opacity-100', 'visible');
        modal.classList.add('opacity-0', 'invisible');
        document.body.style.overflow = 'auto';
    }

    function updateModal() {
        modalImg.src = images[currentIndex].src;
        modalCaption.textContent = images[currentIndex].caption || '';
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateModal();
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateModal();
    }

    document.addEventListener('keydown', function (e) {
        if (!modal.classList.contains('visible')) return;

        if (e.key === 'Escape') {
            closeModal();
        } else if (e.key === 'ArrowRight') {
            nextImage();
        } else if (e.key === 'ArrowLeft') {
            prevImage();
        }
    });

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    galleryItems.forEach((img, index) => {
        img.closest('.gallery-img').addEventListener('click', () => openModal(index));
    });

    window.nextImage = nextImage;
    window.prevImage = prevImage;
});
