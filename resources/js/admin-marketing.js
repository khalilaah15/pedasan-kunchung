// resources/js/admin-marketing.js

document.addEventListener('DOMContentLoaded', function () {
    console.log('Halaman Admin Marketing Kit siap!');

    // Modal Elements
    const openModalBtn = document.querySelector('.add-kit-btn');
    const modalOverlay = document.querySelector('.modal-overlay');
    const closeModalBtn = document.querySelector('.close-btn');
    const cancelButton = document.querySelector('.btn-white');
    const form = document.getElementById('addMarketingForm'); 

    // Buka modal
    if (openModalBtn) {
        openModalBtn.addEventListener('click', function (e) {
            e.preventDefault();
            modalOverlay.classList.add('active');
        });
    }

    // Tutup modal
    function closeModal() {
        modalOverlay.classList.remove('active');
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    if (cancelButton) {
        cancelButton.addEventListener('click', closeModal);
    }

    if (modalOverlay) {
        modalOverlay.addEventListener('click', function (e) {
            if (e.target === modalOverlay) closeModal();
        });
    }

    const modalContent = document.querySelector('.modal');
    if (modalContent) {
        modalContent.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    }

    // Submit form via AJAX — Hanya jika form ada
    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            try {
                const response = await fetch('/admin/marketing', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                // Cek jika response OK
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json(); 

                if (result.success) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Gagal: ' + (result.message || 'Coba lagi.'));
                }
            } catch (err) {
                console.error('Fetch error:', err);
                alert('Koneksi gagal. Periksa konsol untuk detail.');
            }
        });
    }
});