// resources/js/auth.js

document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-btn');
    const forms = document.querySelectorAll('.form-section');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            // Add active to clicked tab
            tab.classList.add('active');

            // Show corresponding form
            const target = tab.getAttribute('data-target');
            forms.forEach(form => {
                form.style.display = 'none';
            });
            document.getElementById(target).style.display = 'block';
        });
    });

    // Default: show login form
    document.getElementById('login-form').style.display = 'block';
});