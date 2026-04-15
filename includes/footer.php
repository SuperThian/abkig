<?php
/**
 * ABKIG - Footer Include
 */
if (!isset($baseUrl)) $baseUrl = '';
?>
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="footer-grid">
      <!-- Brand Column -->
      <div class="footer-brand">
        <div class="footer-logo">
          <img src="<?= $baseUrl ?>asset/image/ABKIG Logo.png" alt="ABKIG Logo">
          <div class="footer-logo-name">Akademi Bisnis<br>Kuliner Indonesia Global</div>
        </div>
        <p>Akademi vokasi pertama di Indonesia yang mengintegrasikan keahlian teknis kuliner dengan kemampuan bisnis nyata. Berdiri di bawah naungan Yayasan Sejahtera Indonesia Global.</p>
        <div class="footer-social">
          <a href="#" class="social-link" aria-label="Instagram">📷</a>
          <a href="#" class="social-link" aria-label="Facebook">📘</a>
          <a href="#" class="social-link" aria-label="YouTube">▶️</a>
          <a href="#" class="social-link" aria-label="LinkedIn">💼</a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-col">
        <h4>Tautan Cepat</h4>
        <ul class="footer-links">
          <li><a href="<?= $baseUrl ?>index.php">Home</a></li>
          <li><a href="<?= $baseUrl ?>about.php">Tentang ABKIG</a></li>
          <li><a href="<?= $baseUrl ?>program.php">Program Studi</a></li>
          <li><a href="<?= $baseUrl ?>academic.php">Kurikulum</a></li>
          <li><a href="<?= $baseUrl ?>newsroom.php">Newsroom</a></li>
          <li><a href="<?= $baseUrl ?>contact.php">Kontak</a></li>
        </ul>
      </div>

      <!-- Programs -->
      <div class="footer-col">
        <h4>Program Kami</h4>
        <ul class="footer-links">
          <li><a href="<?= $baseUrl ?>program.php#d3">D3 Pastry &amp; Culinary Business</a></li>
          <li><a href="<?= $baseUrl ?>program.php#d1">Diploma 1 (D1)</a></li>
          <li><a href="<?= $baseUrl ?>program.php#shortcourse">Short Course 6 Bulan</a></li>
          <li><a href="<?= $baseUrl ?>program.php#shortcourse">Short Course 3 Bulan</a></li>
          <li><a href="<?= $baseUrl ?>academic.php">Kurikulum Lengkap</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="footer-col">
        <h4>Kontak</h4>
        <div class="footer-contact-item">
          <span class="icon">📍</span>
          <p>Jl. Pantai Indah Utara 2, Pantai Indah Kapuk, Jakarta Utara 14460</p>
        </div>
        <div class="footer-contact-item">
          <span class="icon">📧</span>
          <a href="mailto:akademi.bisniskulinerindoglob@gmail.com">akademi.bisniskuliner<br>indoglob@gmail.com</a>
        </div>
        <div class="footer-contact-item">
          <span class="icon">🕐</span>
          <p>Senin – Sabtu: 08.00 – 17.00 WIB</p>
        </div>
      </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> Akademi Bisnis Kuliner Indonesia Global. Hak cipta dilindungi.</p>
      <div style="display:flex;gap:20px;">
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat &amp; Ketentuan</a>
        <a href="<?= $baseUrl ?>admin/index.php" style="color:rgba(255,255,255,0.25);">Admin</a>
      </div>
    </div>
  </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" aria-label="Kembali ke atas" style="
  position:fixed; bottom:28px; right:28px; z-index:999;
  width:44px; height:44px; border-radius:50%;
  background:var(--navy); color:var(--white);
  border:none; cursor:pointer; font-size:1.1rem;
  box-shadow: 0 4px 16px rgba(15,60,145,0.3);
  opacity:0; pointer-events:none;
  transition:opacity 0.3s ease, transform 0.3s ease;
  display:flex; align-items:center; justify-content:center;
">↑</button>
