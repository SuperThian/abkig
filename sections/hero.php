<?php
/**
 * Hero Section
 * Section pertama dengan headline, subheadline, dan CTA buttons
 */
?>
<section class="hero" id="hero">
    <div class="hero-background">
        <img src="https://images.unsplash.com/photo-1556910103-2a02e94538d6?w=1200&q=80" alt="Chef in kitchen" class="hero-bg-image">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content">
        <p class="hero-eyebrow">AKADEMI BISNIS KULINER INDONESIA GLOBAL</p>
        
        <h1 class="hero-title">
            Membangun Chef yang<br>
            <span class="highlight-gold">Siap Bisnis</span>, Bukan Sekadar Bisa Memasak
        </h1>
        
        <p class="hero-description">
            Program Diploma & Short Course berbasis industri<br>
            dengan 67% praktik langsung + pembelajaran bisnis nyata
        </p>
        
        <div class="hero-cta">
            <button class="btn btn-primary" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">
                Daftar Sekarang
            </button>
            <button class="btn btn-secondary" onclick="document.getElementById('programs').scrollIntoView({behavior: 'smooth'})">
                Lihat Program
            </button>
        </div>
        
        <div class="hero-benefits">
            <div class="benefit-item">
                <span class="checkmark">✓</span>
                <span>67% Hands-on Training</span>
            </div>
            <div class="benefit-item">
                <span class="checkmark">✓</span>
                <span>Berbasis Industri</span>
            </div>
            <div class="benefit-item">
                <span class="checkmark">✓</span>
                <span>Siap Kerja & Bisnis</span>
            </div>
        </div>
    </div>
</section>
