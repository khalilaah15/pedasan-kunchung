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

// Buka modal edit
document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        const url = btn.getAttribute('data-edit-url');
        
        try {
            const response = await fetch(url);
            const product = await response.json();

            // Isi form edit
            document.getElementById('edit_id').value = product.id_katalog;
            document.getElementById('edit_nama_produk').value = product.nama_katalog;
            document.getElementById('edit_deskripsi').value = product.deskripsi_katalog || '';
            document.getElementById('edit_harga').value = product.harga_katalog;
            document.getElementById('edit_stok').value = product.stok_katalog;

            // Buka modal
            document.querySelector('.modal-overlay-edit').classList.add('active');
        } catch (err) {
            alert('Gagal memuat data produk.');
        }
    });
});

// Tutup modal edit
document.querySelector('.close-btn-edit')?.addEventListener('click', () => {
    document.querySelector('.modal-overlay-edit').classList.remove('active');
});

document.querySelector('.btn-batal-edit')?.addEventListener('click', () => {
    document.querySelector('.modal-overlay-edit').classList.remove('active');
});

// Submit delete
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Yakin ingin menghapus produk ini?')) {
            const form = btn.closest('form');
            form.submit();
        }
    });
});

// Set action form edit saat modal dibuka
document.querySelector('#editProductForm')?.addEventListener('submit', function(e) {
    const id = document.getElementById('edit_id').value;
    this.action = `/admin/products/${id}`;
});

document.getElementById('edit_file_gambar').addEventListener('change', function(e) {
    const preview = document.getElementById('edit_image_preview');
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            preview.src = ev.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});