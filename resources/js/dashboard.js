// resources/js/dashboard.js

document.addEventListener('DOMContentLoaded', function() {
    // Tambah ke keranjang
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');

            // // Kirim via AJAX
            // fetch('/cart/add', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //     },
            //     body: JSON.stringify({
            //         id_katalog: productId,
            //         nama_katalog: productName,
            //         harga_katalog: productPrice,
            //         qty: 1
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     // Update badge keranjang
            //     document.querySelector('.badge').textContent = data.totalItems;
            //     alert(`${productName} ditambahkan ke keranjang!`);
            // })
            // .catch(err => console.error('Error:', err));
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Buka modal
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            
            document.getElementById('modal_product_id').value = productId;
            document.getElementById('modal_product_name').value = productName;
            document.getElementById('modal_product_price').value = 'Rp ' + parseFloat(productPrice).toLocaleString('id-ID');
            document.getElementById('modal_qty').value = 0;
            document.getElementById('modal_catatan').value = '';
            
            document.querySelector('.modal-overlay-cart').classList.add('active');
        });
    });

    // Tutup modal
    const closeBtn = document.querySelector('.close-btn-cart');
    const cancelBtn = document.querySelector('.btn-cancel-cart');
    const overlay = document.querySelector('.modal-overlay-cart');
    
    [closeBtn, cancelBtn, overlay].forEach(el => {
        el?.addEventListener('click', function(e) {
            if (e.target === overlay || e.target === closeBtn || e.target === cancelBtn) {
                overlay.classList.remove('active');
            }
        });
    });

    // Submit form
    document.getElementById('add-to-cart-form')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        try {
            const response = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_katalog: document.getElementById('modal_product_id').value,
                    qty: document.getElementById('modal_qty').value,
                    catatan: document.getElementById('modal_catatan').value
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Update badge keranjang di navbar
                const badge = document.querySelector('.badge');
                if (badge) badge.textContent = result.totalItems;
                
                alert(result.message);
                overlay.classList.remove('active');
            }
        } catch (err) {
            alert('Gagal menambahkan ke keranjang.');
        }
    });
});