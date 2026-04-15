<?php
/**
 * ABKIG - Program Page
 */
$currentPage = 'program';
$baseUrl = '';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Program Akademi ABKIG — D3 Pastry & Culinary Business, Diploma 1, Short Course 3 dan 6 Bulan. Biaya program dan keunggulan kompetitif.">
  <title>Program Akademi — ABKIG</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
  .section-subtitle,
  .about-snippet-text p,
  .nilai-box p,
  .cta-content p,
  .page-hero p,
  .highlight-box p {
    text-align: center;
  }
</style>

<?php include 'includes/navbar.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
  <div class="container">
    <div class="page-hero-content">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="index.php">Home</a>
        <span class="separator">›</span>
        <span class="current">Program Akademi</span>
      </nav>
      <h1>Program Akademi</h1>
      <p style="color:rgba(255,255,255,0.75);max-width:560px;margin-top:12px;text-align:left;">
        Temukan program yang tepat untuk perjalanan karir kuliner dan bisnis Anda bersama ABKIG.
      </p>
    </div>
  </div>
</section>

<!-- =============================================
     STRUKTUR PROGRAM
     ============================================= -->
<section class="section bg-white" id="struktur-program">
  <div class="container">
    <div class="section-header text-center">
      <div class="section-label">Struktur Program</div>
      <h2 class="section-title">Pilihan Program Studi</h2>
      <p class="section-subtitle">ABKIG menawarkan empat jalur pendidikan kuliner profesional yang dapat disesuaikan
        dengan kebutuhan Anda</p>
    </div>

    <div class="program-table-wrapper fade-in">
      <table class="program-table">
        <thead>
          <tr>
            <th>Program</th>
            <th>Jenjang</th>
            <th>Durasi</th>
            <th>Beban Studi</th>
            <th>Porsi Praktik</th>
            <th>Fokus Kompetensi</th>
          </tr>
        </thead>
        <tbody>
          <tr id="d3">
            <td>D3 Pastry &amp; Culinary Business</td>
            <td>Diploma Tiga (D3)</td>
            <td>6 Semester (±3 Tahun)</td>
            <td>±109 SKS</td>
            <td>67% Praktik</td>
            <td>Teknis Kuliner + Bisnis + Magang 12 SKS</td>
          </tr>
          <tr id="d1">
            <td>Diploma 1 (D1)</td>
            <td>Diploma Satu (D1)</td>
            <td>2 Semester (1 Tahun)</td>
            <td>±36 SKS</td>
            <td>60% Praktik</td>
            <td>Teknis Kuliner Dasar + Bisnis Dasar</td>
          </tr>
          <tr id="shortcourse">
            <td>Short Course 6 Bulan</td>
            <td>Non-Gelar</td>
            <td>6 Bulan</td>
            <td>Modul Intensif</td>
            <td>70% Praktik</td>
            <td>Keahlian Spesifik Kuliner + Dasar Bisnis</td>
          </tr>
          <tr>
            <td>Short Course 3 Bulan</td>
            <td>Non-Gelar</td>
            <td>3 Bulan</td>
            <td>Modul Intensif</td>
            <td>75% Praktik</td>
            <td>Satu Keahlian Kuliner Spesifik</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- =============================================
     DETAIL D3
     ============================================= -->
<section class="section bg-light">
  <div class="container">
    <div class="about-snippet">
      <div class="about-snippet-text slide-in-left">
        <div class="program-tag" style="display:inline-block;margin-bottom:16px;">⭐ Program Unggulan</div>
        <div class="section-label">D3 Program</div>
        <h2 class="section-title">D3 Pastry &amp; Culinary Business</h2>
        <p style="margin-bottom:16px;text-align:center;">
          Program diploma tiga (D3) kami merupakan program andalan ABKIG yang dirancang untuk menghasilkan
          profesional kuliner yang siap memimpin di industri. Dengan beban studi ±109 SKS selama 6 semester,
          mahasiswa mendapatkan pendidikan komprehensif yang memadukan teknis dan bisnis.
        </p>
        <div class="highlight-box">
          <p style="text-align:center;">67% waktu belajar adalah praktik langsung di dapur profesional — memastikan
            kesiapan kerja yang sesungguhnya.</p>
        </div>
        <ul style="margin:20px 0;display:flex;flex-direction:column;gap:10px;">
          <li style="display:flex;gap:10px;align-items:flex-start;font-size:0.95rem;color:var(--gray-600);">
            <span style="color:var(--gold);">✓</span> Kurikulum 6 semester dengan ±109 SKS total
          </li>
          <li style="display:flex;gap:10px;align-items:flex-start;font-size:0.95rem;color:var(--gray-600);">
            <span style="color:var(--gold);">✓</span> Program magang industri 12 SKS (1 semester penuh)
          </li>
          <li style="display:flex;gap:10px;align-items:flex-start;font-size:0.95rem;color:var(--gray-600);">
            <span style="color:var(--gold);">✓</span> Tugas akhir berbasis business project nyata
          </li>
          <li style="display:flex;gap:10px;align-items:flex-start;font-size:0.95rem;color:var(--gray-600);">
            <span style="color:var(--gold);">✓</span> Sertifikasi kompetensi nasional dan internasional
          </li>
          <li style="display:flex;gap:10px;align-items:flex-start;font-size:0.95rem;color:var(--gray-600);">
            <span style="color:var(--gold);">✓</span> Akses ke program pertukaran dan studi banding internasional
          </li>
        </ul>
        <a href="contact.php#daftar" class="btn btn-primary">Daftar Program D3 →</a>
      </div>
      <div class="about-visual slide-in-right">
        <div class="about-visual-main">
          <div class="about-visual-text">
            <h3>D3 Highlights</h3>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:24px;">
              <div style="background:rgba(250,174,29,0.15);border-radius:12px;padding:20px;text-align:center;">
                <div style="color:var(--gold);font-size:2rem;font-weight:800;">109</div>
                <div style="color:rgba(255,255,255,0.75);font-size:0.75rem;margin-top:4px;">SKS Total</div>
              </div>
              <div style="background:rgba(250,174,29,0.15);border-radius:12px;padding:20px;text-align:center;">
                <div style="color:var(--gold);font-size:2rem;font-weight:800;">6</div>
                <div style="color:rgba(255,255,255,0.75);font-size:0.75rem;margin-top:4px;">Semester</div>
              </div>
              <div style="background:rgba(250,174,29,0.15);border-radius:12px;padding:20px;text-align:center;">
                <div style="color:var(--gold);font-size:2rem;font-weight:800;">67%</div>
                <div style="color:rgba(255,255,255,0.75);font-size:0.75rem;margin-top:4px;">Praktik</div>
              </div>
              <div style="background:rgba(250,174,29,0.15);border-radius:12px;padding:20px;text-align:center;">
                <div style="color:var(--gold);font-size:2rem;font-weight:800;">12</div>
                <div style="color:rgba(255,255,255,0.75);font-size:0.75rem;margin-top:4px;">SKS Magang</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     BIAYA PROGRAM
     ============================================= -->
<section class="section bg-white" id="biaya">
  <div class="container">
    <div class="section-header text-center">
      <div class="section-label">Investasi Pendidikan</div>
      <h2 class="section-title">Biaya Program</h2>
      <p class="section-subtitle">Investasi terbaik untuk membangun karir kuliner profesional yang berkelanjutan</p>
    </div>

    <div class="biaya-grid fade-in">
      <!-- D3 -->
      <div class="biaya-card">
        <div class="biaya-card-header">
          <div class="program-name">D3 Pastry &amp; Culinary Business</div>
          <div class="program-type">Program Diploma 3 · 6 Semester</div>
        </div>
        <div class="biaya-card-body">
          <div class="biaya-item">
            <span class="label">Uang Pangkal (Sekali Bayar)</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Biaya Semester (per semester)</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Biaya Praktik &amp; Perlengkapan</span>
            <span class="value">Termasuk dalam paket</span>
          </div>
          <div class="biaya-item">
            <span class="label">Durasi Studi</span>
            <span class="value">6 Semester (±3 Tahun)</span>
          </div>
          <div class="biaya-item total">
            <span class="label">Untuk info biaya lengkap</span>
            <span class="value">Hubungi Kami</span>
          </div>
          <div style="margin-top:16px;">
            <a href="contact.php" class="btn btn-primary" style="width:100%;justify-content:center;">Minta Informasi
              Biaya</a>
          </div>
        </div>
      </div>

      <!-- D1 -->
      <div class="biaya-card">
        <div class="biaya-card-header" style="background:linear-gradient(135deg,#1a6b4a,#28a070);">
          <div class="program-name">Diploma 1 (D1)</div>
          <div class="program-type">Program Diploma 1 · 2 Semester</div>
        </div>
        <div class="biaya-card-body">
          <div class="biaya-item">
            <span class="label">Uang Pangkal (Sekali Bayar)</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Biaya Semester (per semester)</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Biaya Praktik &amp; Perlengkapan</span>
            <span class="value">Termasuk dalam paket</span>
          </div>
          <div class="biaya-item">
            <span class="label">Durasi Studi</span>
            <span class="value">2 Semester (1 Tahun)</span>
          </div>
          <div class="biaya-item total">
            <span class="label">Untuk info biaya lengkap</span>
            <span class="value">Hubungi Kami</span>
          </div>
          <div style="margin-top:16px;">
            <a href="contact.php" class="btn btn-primary"
              style="width:100%;justify-content:center;background:#1a6b4a;border-color:#1a6b4a;">Minta Informasi
              Biaya</a>
          </div>
        </div>
      </div>

      <!-- Short Course 6 Bulan -->
      <div class="biaya-card">
        <div class="biaya-card-header" style="background:linear-gradient(135deg,#8B4513,#A0522D);">
          <div class="program-name">Short Course 6 Bulan</div>
          <div class="program-type">Program Intensif Non-Gelar</div>
        </div>
        <div class="biaya-card-body">
          <div class="biaya-item">
            <span class="label">Biaya Program</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Perlengkapan Dapur</span>
            <span class="value">Termasuk dalam paket</span>
          </div>
          <div class="biaya-item">
            <span class="label">Durasi</span>
            <span class="value">6 Bulan (Intensif)</span>
          </div>
          <div class="biaya-item total">
            <span class="label">Untuk info biaya lengkap</span>
            <span class="value">Hubungi Kami</span>
          </div>
          <div style="margin-top:16px;">
            <a href="contact.php" class="btn btn-primary"
              style="width:100%;justify-content:center;background:#8B4513;border-color:#8B4513;">Minta Informasi
              Biaya</a>
          </div>
        </div>
      </div>

      <!-- Short Course 3 Bulan -->
      <div class="biaya-card">
        <div class="biaya-card-header" style="background:linear-gradient(135deg,#5a3e8b,#7a5ab0);">
          <div class="program-name">Short Course 3 Bulan</div>
          <div class="program-type">Program Intensif Non-Gelar</div>
        </div>
        <div class="biaya-card-body">
          <div class="biaya-item">
            <span class="label">Biaya Program</span>
            <span class="value">Hubungi Penerimaan</span>
          </div>
          <div class="biaya-item">
            <span class="label">Perlengkapan Dapur</span>
            <span class="value">Termasuk dalam paket</span>
          </div>
          <div class="biaya-item">
            <span class="label">Durasi</span>
            <span class="value">3 Bulan (Intensif)</span>
          </div>
          <div class="biaya-item total">
            <span class="label">Untuk info biaya lengkap</span>
            <span class="value">Hubungi Kami</span>
          </div>
          <div style="margin-top:16px;">
            <a href="contact.php" class="btn btn-primary"
              style="width:100%;justify-content:center;background:#5a3e8b;border-color:#5a3e8b;">Minta Informasi
              Biaya</a>
          </div>
        </div>
      </div>
    </div>

    <div
      style="text-align:center;margin-top:40px;padding:24px;background:rgba(15,60,145,0.05);border-radius:12px;border:1px solid rgba(15,60,145,0.1);"
      class="fade-in">
      <p style="margin:0;font-size:0.9rem;text-align:center;">
        💡 <strong>Info Beasiswa:</strong> ABKIG menyediakan beasiswa prestasi bagi pendaftar berprestasi.
        Hubungi tim penerimaan kami untuk informasi lebih lanjut tentang skema cicilan dan beasiswa yang tersedia.
      </p>
    </div>
  </div>
</section>

<!-- =============================================
     KEUNGGULAN KOMPETITIF DETAIL
     ============================================= -->
<section class="section bg-light" id="keunggulan">
  <div class="container">
    <div class="section-header text-center">
      <div class="section-label">Keunggulan Kami</div>
      <h2 class="section-title">Mengapa Memilih ABKIG?</h2>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;" class="fade-in">
      <div class="nilai-box">
        <h4>🏭 Fondasi Industri yang Terbukti</h4>
        <p>Dengan lebih dari 14 tahun pengalaman mendidik profesional kuliner melalui IPS, ABKIG memiliki rekam jejak
          yang terbukti dalam menghasilkan lulusan yang diterima industri. Kurikulum kami dikembangkan bersama praktisi
          industri aktif.</p>
      </div>
      <div class="nilai-box">
        <h4>🔬 Model Pembelajaran Berbasis Praktik (67%)</h4>
        <p>Kami percaya bahwa keahlian kuliner sejati hanya bisa dikuasai melalui praktik. Itulah mengapa 67% dari total
          program adalah praktik langsung di dapur berstandar industri, bukan hanya teori di kelas.</p>
      </div>
      <div class="nilai-box">
        <h4>🏆 Sistem Kompetensi Ganda</h4>
        <p>ABKIG adalah satu-satunya akademi vokasi kuliner yang secara sistematis mengintegrasikan pendidikan teknis
          kuliner level advanced dengan pendidikan bisnis komprehensif dalam satu program terintegrasi.</p>
      </div>
      <div class="nilai-box">
        <h4>🌏 Integrasi Global dan Inovasi Lokal</h4>
        <p>Kurikulum kami mengadopsi standar pendidikan kuliner internasional (merujuk CIA dan Le Cordon Bleu) sambil
          secara khusus mengintegrasikan dan mengangkat kekayaan kuliner Nusantara ke panggung global.</p>
      </div>
      <div class="nilai-box">
        <h4>📈 Jalur Industri yang Terstruktur</h4>
        <p>Program magang 12 SKS, career fair, mentoring industri, dan job placement support memastikan lulusan ABKIG
          memiliki jalur karir yang jelas dan konkret, bukan sekadar gelar di atas kertas.</p>
      </div>
      <div class="nilai-box">
        <h4>🎓 Fasilitas Dapur Profesional</h4>
        <p>Mahasiswa belajar dan berlatih menggunakan peralatan dapur profesional standar industri, dari oven deck
          industrial, kitchen mixer professional, hingga peralatan pastry tingkat lanjut.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section cta-section">
  <div class="container">
    <div class="cta-content">
      <h2 style="color:var(--white);">Siap Bergabung?</h2>
      <p>Daftarkan diri Anda sekarang dan mulailah perjalanan kuliner profesional Anda bersama ABKIG.</p>
      <a href="contact.php#daftar" class="btn btn-gold btn-lg">Daftar Sekarang →</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>

</html>