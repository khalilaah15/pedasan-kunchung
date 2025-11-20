// resources/js/admin-histori.js

document.addEventListener('DOMContentLoaded', function() {
    window.updateStatus = async function(select) {
        const transaksiId = select.getAttribute('data-id');
        const newStatus = select.value;

        // Simpan status lama untuk rollback
        const oldStatus = select.getAttribute('data-old') || select.options[select.selectedIndex].textContent;

        try {
            const response = await fetch(`/admin-histori/${transaksiId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })

            const result = await response.json();

            if (result.success) {
                // Update visual badge
                const row = select.closest('tr');
                const badge = row.querySelector('.status-badge');
                
                // Tentukan kelas berdasarkan status baru
                let className = '';
                let text = newStatus;
                
                if (newStatus === 'Pending') {
                    className = 'status-pending';
                } else if (newStatus === 'Processing') {
                    className = 'status-processing';
                } else if (newStatus === 'Completed') {
                    className = 'status-completed';
                } else if (newStatus === 'Cancelled') {
                    className = 'status-cancelled';
                }

                badge.className = 'status-badge ' + className;
                badge.textContent = text;

                // Feedback sukses
                select.style.background = '#e8f5e9';
                setTimeout(() => {
                    select.style.background = '#f8f9fa';
                }, 1000);

                alert(result.message);
            } else {
                // Rollback jika gagal
                select.value = oldStatus;
                alert('Gagal memperbarui status.');
            }
        } catch (err) {
            // Rollback jika error
            select.value = oldStatus;
            alert('Koneksi gagal. Coba lagi.');
        }
    };

    // Simpan status awal saat load
    document.querySelectorAll('.action-dropdown').forEach(select => {
        const current = select.value;
        select.setAttribute('data-current', current);
        select.setAttribute('data-old', current);
    });
});