@extends('layouts.dashboard')

@section('title', 'Beri Testimoni')

@vite(['resources/css/testimoni.css'])

@section('content')
<div class="testimoni-container">
    <div class="testimoni-form-container">
        <div class="testimoni-header">
            <div>
                <h1 class="testimoni-title">Beri Testimoni</h1>
                <p class="testimoni-subtitle">Bagikan pengalaman Anda menggunakan produk/layanan kami</p>
            </div>
        </div>

        <div class="testimoni-form">
            <form id="testimoni-form" action="{{ route('testimoni.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Rating</label>
                    <div class="rating-container">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="rating-btn" data-rating="{{ $i }}">
                                <svg class="rating-star-large text-gray-300 rating-star" data-rating="{{ $i }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-input" value="5" required>
                    <div id="rating-text" style="font-size: 0.875rem; color: #6b7280; margin-top: 4px;">Sangat Puas</div>
                    @error('rating')
                        <div style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pesan" class="form-label">Testimoni Anda</label>
                    <textarea name="pesan" id="pesan" class="form-textarea" placeholder="Ceritakan pengalaman Anda menggunakan produk/layanan kami..." required>{{ old('pesan') }}</textarea>
                    <div class="char-count">
                        <span>Minimal 10 karakter</span>
                        <span id="char-count">0/500</span>
                    </div>
                    @error('pesan')
                        <div style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('testimoni.saya') }}" class="testimoni-btn testimoni-btn-secondary">
                        Batal
                    </a>
                    <button type="submit" id="submit-btn" class="testimoni-btn testimoni-btn-primary">
                        <span>Kirim Testimoni</span>
                        <svg id="loading-spinner" style="width: 16px; height: 16px; margin-left: 8px; display: none;" class="loading-spinner" fill="none" viewBox="0 0 24 24">
                            <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating-star');
    const ratingInput = document.getElementById('rating-input');
    const ratingText = document.getElementById('rating-text');
    
    const ratingMessages = {
        1: 'Tidak Puas',
        2: 'Kurang Puas',
        3: 'Cukup Puas',
        4: 'Puas',
        5: 'Sangat Puas'
    };
    
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingInput.value = rating;
            
            // Update star display
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.style.color = '#fbbf24';
                } else {
                    s.style.color = '#d1d5db';
                }
            });
            
            // Update rating text
            if (ratingText && ratingMessages[rating]) {
                ratingText.textContent = ratingMessages[rating];
            }
        });
    });

    // Character counter
    const textarea = document.getElementById('pesan');
    const charCount = document.getElementById('char-count');
    
    if (textarea && charCount) {
        textarea.addEventListener('input', () => {
            const length = textarea.value.length;
            charCount.textContent = `${length}/500`;
            
            if (length > 450) {
                charCount.style.color = '#ef4444';
            } else {
                charCount.style.color = '#6b7280';
            }
        });
        
        charCount.textContent = `${textarea.value.length}/500`;
    }

    // Form submission
    const form = document.getElementById('testimoni-form');
    const submitBtn = document.getElementById('submit-btn');
    const loadingSpinner = document.getElementById('loading-spinner');
    
    if (form && submitBtn && loadingSpinner) {
        form.addEventListener('submit', (e) => {
            const textarea = document.getElementById('pesan');
            if (textarea && textarea.value.length < 10) {
                e.preventDefault();
                alert('Testimoni harus minimal 10 karakter');
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            loadingSpinner.style.display = 'inline';
            submitBtn.querySelector('span').textContent = 'Mengirim...';
        });
    }
});
</script>
@endsection