<?php
/**
 * Shared Admin Sidebar
 * Usage: $activePage = 'dashboard'; include 'includes/sidebar.php';
 */
?>
<aside class="admin-sidebar">
  <div class="admin-sidebar-header">
    <img src="../asset/image/ABKIG Logo.png" alt="ABKIG Logo" style="filter: brightness(0) invert(1);">
    <div class="admin-sidebar-title">
      ABKIG Admin
      <small>Panel Pengelolaan</small>
    </div>
  </div>
  <nav class="admin-nav">
    <div class="admin-nav-section">Menu Utama</div>
    <a href="index.php" class="admin-nav-link <?= ($activePage ?? '') === 'dashboard' ? 'active' : '' ?>">
      <span class="nav-icon">📊</span> Dashboard
    </a>

    <div class="admin-nav-section">Pengelolaan Konten</div>
    <a href="index.php#news-table" class="admin-nav-link <?= ($activePage ?? '') === 'news' ? 'active' : '' ?>">
      <span class="nav-icon">📰</span> Kelola Berita
    </a>
    <a href="categories.php" class="admin-nav-link <?= ($activePage ?? '') === 'categories' ? 'active' : '' ?>">
      <span class="nav-icon">🏷️</span> Kelola Kategori
    </a>
    <a href="partners.php" class="admin-nav-link <?= ($activePage ?? '') === 'partners' ? 'active' : '' ?>">
      <span class="nav-icon">🤝</span> Kelola Partner
    </a>
    <a href="testimonials.php" class="admin-nav-link <?= ($activePage ?? '') === 'testimonials' ? 'active' : '' ?>">
      <span class="nav-icon">⭐</span> Kelola Testimoni
    </a>

    <div class="admin-nav-section">Sistem</div>
    <a href="../index.php" class="admin-nav-link" target="_blank">
      <span class="nav-icon">🌐</span> Lihat Website
    </a>
    <a href="index.php?logout=1" class="admin-nav-link" style="color:#ffcdcd !important;" onclick="return confirm('Yakin ingin keluar?')">
      <span class="nav-icon">🚪</span> Logout
    </a>
  </nav>
</aside>
