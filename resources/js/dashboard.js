// resources/js/dashboard.js

document.addEventListener('DOMContentLoaded', function() {
    // Tambah ke keranjang
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');

            // Kirim via AJAX
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id_katalog: productId,
                    nama_katalog: productName,
                    harga_katalog: productPrice,
                    qty: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                // Update badge keranjang
                document.querySelector('.badge').textContent = data.totalItems;
                alert(`${productName} ditambahkan ke keranjang!`);
            })
            .catch(err => console.error('Error:', err));
        });
    });
});