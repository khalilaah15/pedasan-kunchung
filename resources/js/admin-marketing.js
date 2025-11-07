// resources/js/admin-marketing.js

document.addEventListener('DOMContentLoaded', function() {
    console.log('Halaman Admin Marketing Kit siap!');

    const openModalBtn = document.querySelector('.add-kit-btn');
    const modalOverlay = document.querySelector('.modal-overlay');
    const closeModalBtn = document.querySelector('.close-btn');
    const cancelButton = document.querySelector('.btn-white');
    const saveButton = document.querySelector('.btn-red');

    // Buka modal
    openModalBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modalOverlay.classList.add('active');
    });

    // Tutup modal via X
    closeModalBtn.addEventListener('click', function() {
        modalOverlay.classList.remove('active');
    });

    // Tutup modal via Batal
    cancelButton.addEventListener('click', function() {
        modalOverlay.classList.remove('active');
    });

    // Tutup modal via klik luar
    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            modalOverlay.classList.remove('active');
        }
    });

    // Prevent close on click inside modal
    document.querySelector('.modal').addEventListener('click', function(e) {
        e.stopPropagation();
    });
});