<?php
/**
 * ABKIG - Navbar Include
 */
$currentFile = basename($_SERVER['PHP_SELF']);
$active = basename($_SERVER['PHP_SELF'], '.php');
?>
<?php if ($currentFile === 'index.php'): ?>
  <nav class="navbar navbar-transparent" id="mainNav" role="navigation" aria-label="Main navigation">
  <?php else: ?>
    <nav class="navbar navbar-solid" id="mainNav" role="navigation" aria-label="Main navigation">
    <?php endif; ?>
    <div class="container">
      <div class="navbar-inner">
        <!-- Logo -->
        <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>index.php" class="navbar-logo" aria-label="ABKIG Home">
          <img src="<?= isset($baseUrl) ? $baseUrl : '' ?>asset/image/ABKIG Logo.png" alt="ABKIG Logo" height="50">
          <div class="navbar-logo-text">
            <span class="brand-name nav-brand-text">ABKIG</span>
            <span class="brand-tagline nav-brand-text">Akademi Bisnis Kuliner Indonesia Global</span>
          </div>
        </a>

        <!-- Desktop Menu -->
        <ul class="navbar-menu" id="navMenu" role="menubar">
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>index.php"
              class="nav-link <?= $active === 'home' || $active === 'index' ? 'active' : '' ?>" role="menuitem">Home</a>
          </li>
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>about.php"
              class="nav-link <?= $active === 'about' ? 'active' : '' ?>" role="menuitem">About</a>
          </li>
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>program.php"
              class="nav-link <?= $active === 'program' ? 'active' : '' ?>" role="menuitem">Program</a>
          </li>
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>academic.php"
              class="nav-link <?= $active === 'academic' ? 'active' : '' ?>" role="menuitem">Academic</a>
          </li>
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>newsroom.php"
              class="nav-link <?= $active === 'newsroom' || $active === 'news_detail' ? 'active' : '' ?>"
              role="menuitem">Newsroom</a>
          </li>
          <li role="none">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>contact.php"
              class="nav-link <?= $active === 'contact' ? 'active' : '' ?>" role="menuitem">Contact</a>
          </li>

          <!-- Mobile CTA inside menu -->
          <li class="mobile-cta" role="none" style="margin-top:16px;">
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>admin/index.php" class="btn btn-primary"
              style="display:inline-flex;align-items:center;margin-bottom:8px;" role="menuitem">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px;">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
              </svg> Login
            </a>
            <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>contact.php#daftar" class="btn btn-primary"
              role="menuitem">Daftar Sekarang</a>
          </li>
        </ul>

        <!-- Actions + Hamburger -->
        <div class="navbar-actions">
          <!-- Admin Button (Desktop) -->
          <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>admin/index.php" class="btn btn-sm btn-primary desktop-only"
            id="navAdmin">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round" style="margin-right:4px;">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
              <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </svg>
            Login
          </a>

          <a href="<?= isset($baseUrl) ? $baseUrl : '' ?>contact.php#daftar" class="btn btn-primary btn-sm" id="navCta">
            Daftar Sekarang
          </a>
          <button class="navbar-toggle" id="navToggle" aria-expanded="false" aria-controls="navMenu"
            aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
    </div>
  </nav>