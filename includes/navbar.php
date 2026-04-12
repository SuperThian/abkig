<?php
/**
 * Navbar Include
 * Navigasi dengan logo ABKIG dan menu items
 */
?>
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo ABKIG -->
        <div class="navbar-logo">
            <a href="index.php" style="text-decoration: none; display: flex; align-items: center;">
                <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" class="logo-svg">
                    <!-- Quadrant A (Orange) -->
                    <rect x="10" y="10" width="45" height="45" fill="#FF6B35" rx="3"/>
                    <text x="32.5" y="47" font-family="Cormorant Garamond" font-size="28" font-weight="700" fill="white" text-anchor="middle" letter-spacing="2">A</text>
                    
                    <!-- Quadrant B (Navy) -->
                    <rect x="65" y="10" width="45" height="45" fill="#0D1B2A" rx="3"/>
                    <text x="87.5" y="47" font-family="Cormorant Garamond" font-size="28" font-weight="700" fill="#E8D08A" text-anchor="middle" letter-spacing="2">B</text>
                    
                    <!-- Quadrant K (Navy) -->
                    <rect x="10" y="65" width="45" height="45" fill="#0D1B2A" rx="3"/>
                    <text x="32.5" y="102" font-family="Cormorant Garamond" font-size="28" font-weight="700" fill="#E8D08A" text-anchor="middle" letter-spacing="2">K</text>
                    
                    <!-- Quadrant IG (Yellow/Gold) -->
                    <rect x="65" y="65" width="45" height="45" fill="#FFD700" rx="3"/>
                    <text x="87.5" y="102" font-family="Jost" font-size="20" font-weight="600" fill="#0D1B2A" text-anchor="middle" letter-spacing="1">IG</text>
                </svg>
            </a>
        </div>

        <!-- CENTER - Menu Items -->
        <div class="navbar-spacer">
            <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>">beranda</a>
            <a href="news.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'news.php' ? 'active' : ''; ?>" style="margin-left: 2rem;">berita</a>
        </div>

        <!-- RIGHT - CTA Button & Admin -->
        <div style="display: flex; gap: 1rem; align-items: center;">
            <a href="admin/" class="nav-link" style="color: rgba(212, 175, 55, 0.6); font-size: 0.65rem;">admin</a>
            <button class="nav-cta" onclick="window.location.href='#contact'">DAFTAR SEKARANG</button>
        </div>

        <!-- Hamburger Menu -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<script>
// Navbar Toggle
document.getElementById('hamburger').addEventListener('click', function() {
    this.classList.toggle('active');
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>
