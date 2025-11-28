class TestimoniManager {
    constructor() {
        this.initRatingSystem();
        this.initCharCounter();
        this.initFormSubmission();
        this.initTestimoniCards();
    }

    // Rating system initialization
    initRatingSystem() {
        const ratingStars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('rating-input');
        const ratingText = document.getElementById('rating-text');

        if (ratingStars.length > 0 && ratingInput) {
            const ratingMessages = {
                1: 'Tidak Puas',
                2: 'Kurang Puas',
                3: 'Cukup Puas',
                4: 'Puas',
                5: 'Sangat Puas'
            };

            ratingStars.forEach(star => {
                star.addEventListener('click', () => {
                    const rating = parseInt(star.getAttribute('data-rating'));
                    this.setRating(rating, ratingStars, ratingInput, ratingText, ratingMessages);
                });

                star.addEventListener('mouseenter', () => {
                    const rating = parseInt(star.getAttribute('data-rating'));
                    this.highlightStars(rating, ratingStars, ratingText, ratingMessages);
                });
            });

            // Add mouse leave event to reset to current rating
            document.getElementById('rating-container')?.addEventListener('mouseleave', () => {
                const currentRating = parseInt(ratingInput.value);
                this.highlightStars(currentRating, ratingStars, ratingText, ratingMessages);
            });
        }
    }

    setRating(rating, stars, input, textElement, messages) {
        input.value = rating;
        this.highlightStars(rating, stars, textElement, messages);
        
        // Add animation effect
        stars[rating - 1].classList.add('animate-pulse');
        setTimeout(() => {
            stars[rating - 1].classList.remove('animate-pulse');
        }, 300);
    }

    highlightStars(rating, stars, textElement, messages) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });

        if (textElement && messages[rating]) {
            textElement.textContent = messages[rating];
        }
    }

    // Character counter for textarea
    initCharCounter() {
        const textarea = document.getElementById('pesan');
        const charCount = document.getElementById('char-count');

        if (textarea && charCount) {
            textarea.addEventListener('input', () => {
                const length = textarea.value.length;
                charCount.textContent = `${length}/500`;
                
                // Change color when approaching limit
                if (length > 450) {
                    charCount.classList.add('text-red-500');
                    charCount.classList.remove('text-gray-500');
                } else {
                    charCount.classList.remove('text-red-500');
                    charCount.classList.add('text-gray-500');
                }
            });

            // Initialize count
            charCount.textContent = `${textarea.value.length}/500`;
        }
    }

    // Form submission handling
    initFormSubmission() {
        const form = document.getElementById('testimoni-form');
        const submitBtn = document.getElementById('submit-btn');
        const loadingSpinner = document.getElementById('loading-spinner');

        if (form && submitBtn && loadingSpinner) {
            form.addEventListener('submit', (e) => {
                const textarea = document.getElementById('pesan');
                if (textarea && textarea.value.length < 10) {
                    e.preventDefault();
                    this.showAlert('Testimoni harus minimal 10 karakter', 'error');
                    return;
                }

                // Show loading state
                submitBtn.disabled = true;
                loadingSpinner.classList.remove('hidden');
                submitBtn.querySelector('span').textContent = 'Mengirim...';
            });
        }
    }

    // Testimoni cards animation
    initTestimoniCards() {
        const cards = document.querySelectorAll('.testimoni-card');
        
        cards.forEach((card, index) => {
            // Add staggered animation
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-fade-in-up');
        });
    }

    // Utility function to show alerts
    showAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        const styles = {
            success: 'bg-green-100 border-green-400 text-green-700',
            error: 'bg-red-100 border-red-400 text-red-700',
            warning: 'bg-yellow-100 border-yellow-400 text-yellow-700',
            info: 'bg-blue-100 border-blue-400 text-blue-700'
        };

        alertDiv.className = `border px-4 py-3 rounded mb-4 ${styles[type]} alert-message`;
        alertDiv.textContent = message;

        // Insert at the top of the content
        const container = document.querySelector('.container');
        if (container) {
            container.insertBefore(alertDiv, container.firstChild);
        }

        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    // Admin specific functions
    initAdminFeatures() {
        this.initBulkActions();
        this.initSearchFilter();
    }

    initBulkActions() {
        const bulkActionForm = document.getElementById('bulk-action-form');
        const checkboxes = document.querySelectorAll('.testimoni-checkbox');

        if (bulkActionForm && checkboxes.length > 0) {
            const selectAll = document.getElementById('select-all');
            
            if (selectAll) {
                selectAll.addEventListener('change', (e) => {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = e.target.checked;
                    });
                });
            }

            // Update select all checkbox state
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    selectAll.checked = allChecked;
                });
            });
        }
    }

    initSearchFilter() {
        const searchInput = document.getElementById('testimoni-search');
        const testimoniRows = document.querySelectorAll('tbody tr');

        if (searchInput && testimoniRows.length > 0) {
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                
                testimoniRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const testimoniManager = new TestimoniManager();
    
    // Check if we're on admin page
    if (document.body.classList.contains('admin-page')) {
        testimoniManager.initAdminFeatures();
    }

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }
        .testimoni-card {
            transition: all 0.3s ease;
        }
        .testimoni-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .rating-star {
            transition: all 0.2s ease;
        }
        .alert-message {
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TestimoniManager;
}