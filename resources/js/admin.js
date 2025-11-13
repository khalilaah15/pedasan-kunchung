// resources/js/admin.js

document.addEventListener('DOMContentLoaded', function() {
    console.log('Halaman Admin Dashboard siap!');
});

document.addEventListener('DOMContentLoaded', function() {
    console.log('Halaman Admin Dashboard siap!');

    // Buka modal tambah produk
    const openModalBtn = document.querySelector('.add-product-btn');
    const modalOverlay = document.querySelector('.modal-overlay');
    const closeModalBtn = document.querySelector('.close-btn');
    const cancelButton = document.querySelector('.btn-white');
    const saveButton = document.querySelector('.btn-red');

    if (openModalBtn) {
        openModalBtn.addEventListener('click', function(e) {
            e.preventDefault();
            modalOverlay.classList.add('active');
        });
    }

    // Tutup modal via X
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function() {
            modalOverlay.classList.remove('active');
        });
    }

    // Tutup modal via Batal
    if (cancelButton) {
        cancelButton.addEventListener('click', function() {
            modalOverlay.classList.remove('active');
        });
    }

    // Tutup modal via klik luar
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
    }

    // Prevent close on click inside modal
    const modalContent = document.querySelector('.modal');
    if (modalContent) {
        modalContent.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
});

// Handle form submit
const form = document.getElementById('addProductForm');
if (form) {
    form.addEventListener('submit', function(e) {
        //
    });
}