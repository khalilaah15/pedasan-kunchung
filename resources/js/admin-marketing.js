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

            // Debug: lihat apa yang dikirim
            for (let [key, value] of formData.entries()) {
                console.log(key, value);
            }

            try {
                const response = await fetch('/admin/marketing', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

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


// Edit
document.addEventListener('DOMContentLoaded', function() {
    const modalOverlayEdit = document.querySelector('.modal-overlay-edit');
    const closeBtnEdit = document.querySelector('.close-btn-edit');
    const btnBatalEdit = document.querySelector('.btn-batal-edit');
    const editForm = document.getElementById('editMarketingKitForm');

    // Function to open modal
    async function openEditModal(kitId) {
        try {
            const response = await fetch(`/admin/marketing/${kitId}/edit`);
            
            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new Error('Response is not JSON');
            }
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            console.log('Data received:', data);
            
            // Fill form with data
            document.getElementById('edit_id').value = data.id_marketing_kit;
            document.getElementById('edit_judul').value = data.judul;
            document.getElementById('edit_deskripsi').value = data.deskripsi || '';
            
            // Show current image info
            const currentImagePreview = document.getElementById('currentImagePreview');
            const currentImageName = document.getElementById('currentImageName');
            
            if (data.file_gambar) {
                // Tampilkan preview gambar
                const imageUrl = data.file_gambar.startsWith('http') ? data.file_gambar : `/storage/${data.file_gambar}`;
                currentImagePreview.src = imageUrl;
                currentImagePreview.style.display = 'block';
                currentImagePreview.onerror = function() {
                    this.style.display = 'none';
                    currentImageName.textContent = 'Gambar tidak dapat dimuat';
                };
                
                // Tampilkan nama file
                const fileName = data.file_gambar.split('/').pop();
                currentImageName.innerHTML = `<a href="${imageUrl}" target="_blank" style="color: #3b82f6; text-decoration: underline;">${fileName}</a>`;
            } else {
                currentImagePreview.style.display = 'none';
                currentImageName.textContent = 'Tidak ada gambar';
            }
            
            // Update form action
            editForm.action = `/admin/marketing/${kitId}`;
            
            // Show modal
            modalOverlayEdit.classList.add('active');
            
        } catch (error) {
            console.error('Error fetching data:', error);
            // Tetap buka modal meski ada error, tapi dengan data kosong
            modalOverlayEdit.classList.add('active');
        }
    }

    // Function to close modal
    function closeEditModal() {
        modalOverlayEdit.classList.remove('active');
        editForm.reset();
        
        // Reset image preview
        document.getElementById('currentImagePreview').style.display = 'none';
        document.getElementById('currentImageName').textContent = '-';
    }

    // Event listeners for edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const kitId = this.getAttribute('data-id');
            console.log('Editing kit ID:', kitId);
            openEditModal(kitId);
        });
    });

    // Close modal events
    closeBtnEdit.addEventListener('click', closeEditModal);
    btnBatalEdit.addEventListener('click', closeEditModal);
    modalOverlayEdit.addEventListener('click', function(e) {
        if (e.target === modalOverlayEdit) {
            closeEditModal();
        }
    });

    // Form submission
    editForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        try {
            submitBtn.textContent = 'Menyimpan...';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const contentType = response.headers.get('content-type');
            let result;
            
            if (contentType && contentType.includes('application/json')) {
                result = await response.json();
            } else {
                // Jika response bukan JSON, anggap berhasil
                result = { success: true };
            }
            
            if (result.success) {
                closeEditModal();
                location.reload();
            } else {
                alert(result.message || 'Terjadi kesalahan saat menyimpan data.');
            }
            
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan jaringan.');
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });

    // Preview image when new file is selected
    document.getElementById('edit_file_gambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('currentImagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
});
