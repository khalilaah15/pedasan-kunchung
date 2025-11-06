// resources/js/dashboard.js

document.addEventListener('DOMContentLoaded', function() {
    // Toggle active tab
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });

    // Add to cart button click (dummy)
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Produk ditambahkan ke keranjang!');
        });
    });

    console.log('Dashboard siap!');
});