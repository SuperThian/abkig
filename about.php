<?php
/**
 * ABKIG - About Page
 */
$currentPage = 'about';
$baseUrl = '';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Tentang ABKIG — Akademi Bisnis Kuliner Indonesia Global. Sejarah, visi misi, dan profil lulusan kami.">
  <title>Tentang ABKIG — Akademi Bisnis Kuliner Indonesia Global</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <?php include 'includes/navbar.php'; ?>

  <!-- Page Hero -->
  <section class="page-hero" aria-label="About Hero">
    <div class="container">
      <div class="page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span class="separator">›</span>
          <span class="current">About</span>
        </nav>
        <h1>Tentang ABKIG</h1>
        <p style="color:rgba(255,255,255,0.75);max-width:560px;margin-top:12px;text-align:justify;">
          Memahami perjalanan, nilai, dan komitmen kami dalam mencetak talenta kuliner dan bisnis terbaik Indonesia.
        </p>
      </div>
    </div>
  </section>

  <!-- =============================================
     LATAR BELAKANG
     ============================================= -->
  <section class="section bg-white" id="latar-belakang">
    <div class="container">
      <div class="about-snippet">
        <div class="about-snippet-text slide-in-left">
          <div class="section-label">Latar Belakang</div>
          <h2 class="section-title">Dari IPS menuju ABKIG:<br>Evolusi Pendidikan Kuliner</h2>
          <p style="margin-bottom:16px;" , style="text-align: justify;">
            Akademi Bisnis Kuliner Indonesia Global (ABKIG) merupakan kelanjutan dari Indonesian Patisserie School (IPS)
            yang telah beroperasi sejak tahun 2010. Selama lebih dari satu dekade, IPS telah berhasil mencetak ratusan
            alumni yang kini berkarir di berbagai perusahaan kuliner terkemuka di Indonesia dan internasional.
          </p>
          <p style="margin-bottom:16px;">
            Seiring dengan perkembangan industri kuliner dan kebutuhan pasar akan tenaga profesional yang tidak hanya
            mahir secara teknis tetapi juga memiliki kompetensi bisnis, IPS bertransformasi menjadi ABKIG — sebuah
            akademi vokasi yang lebih komprehensif dan berorientasi industri.
          </p>
          <div class="highlight-box">
            <p style="text-align: justify;">ABKIG hadir sebagai solusi nyata atas kesenjangan antara kebutuhan industri
              kuliner dan output pendidikan
              tradisional.</p>
          </div>
        </div>
        <div class="about-visual slide-in-right">
          <div class="about-visual-main">
            <img src="asset/image/foto7.jpeg" alt="Latar Belakang ABKIG"
              style="width:100%;height:100%;object-fit:cover;">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =============================================
     SECTION: PERJALANAN KAMI (HORIZONTAL TIMELINE)
     ============================================= -->
  <style>
    .history-section {
      padding: 100px 0;
      background: #f8f9fa;
      color: #1A1A2E;
      font-family: 'Inter', sans-serif;
    }

    .history-header {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 60px;
    }

    .history-header h2 {
      font-size: clamp(2rem, 5vw, 4rem);
      font-weight: 800;
      color: #0F3C91;
      text-transform: uppercase;
      margin: 0;
      line-height: 1;
    }

    /* Active/Featured Content Area */
    .history-featured {
      position: relative;
      margin-bottom: 80px;
      padding-left: 20px;
    }

    .history-bg-year {
      position: absolute;
      top: -40px;
      left: 0;
      font-size: 180px;
      font-weight: 800;
      line-height: 1;
      color: transparent;
      -webkit-text-stroke: 1.5px rgba(15, 60, 145, 0.1);
      z-index: 1;
      user-select: none;
    }

    .history-featured-text {
      position: relative;
      z-index: 2;
      padding-left: 60px;
      max-width: 800px;
      margin-top: 40px;
    }

    .history-featured-title {
      font-size: 24px;
      font-weight: 700;
      color: #0096D1;
      margin-bottom: 16px;
      font-family: 'Inter', sans-serif;
    }

    .history-featured-desc,
    .milestone-desc,
    .about-snippet-text p,
    .cta-content p {
      text-align: justify;
    }

    /* Horizontal Axis */
    .history-timeline {
      position: relative;
      margin-top: 100px;
      overflow-x: auto;
      padding-bottom: 40px;
    }

    .history-axis-container {
      min-width: 1000px;
      position: relative;
    }

    .history-axis-line {
      position: relative;
      height: 4px;
      background: #0096D1;
      margin-bottom: 30px;
    }

    .history-axis-line::after {
      content: '';
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 0;
      height: 0;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-left: 15px solid #0096D1;
    }

    .history-milestones-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
    }

    .milestone-col {
      position: relative;
    }

    .milestone-year {
      font-size: 36px;
      font-weight: 800;
      color: #0F3C91;
      margin-bottom: 20px;
      display: block;
    }

    .milestone-title {
      font-size: 14px;
      font-weight: 700;
      color: #0096D1;
      text-transform: uppercase;
      margin-bottom: 12px;
      line-height: 1.4;
      display: block;
    }

    /* Responsiveness */
    @media (max-width: 1024px) {
      .history-axis-container {
        padding: 0 20px;
      }
    }

    @media (max-width: 768px) {
      .history-bg-year {
        font-size: 120px;
        top: -20px;
      }

      .history-featured-text {
        padding-left: 20px;
      }

      .history-milestones-grid {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .history-axis-container {
        min-width: auto;
      }

      .history-axis-line {
        display: none;
      }

      .milestone-year::before {
        content: "";
        display: inline-block;
        width: 40px;
        height: 3px;
        background: #0096D1;
        vertical-align: middle;
        margin-right: 15px;
      }
    }
  </style>

  <section class="history-section" id="history">
    <div class="container">
      <!-- Header -->
      <div class="history-header">
        <h2>Our History</h2>
      </div>

      <!-- Featured Display (Most Recent/Main) -->
      <div class="history-featured">
        <div class="history-bg-year">2026</div>
        <div class="history-featured-text">
          <h3 class="history-featured-title">Transformasi Menjadi ABKIG — Institusi Pendidikan Tinggi Vokasi</h3>
          <p class="history-featured-desc">
            Tahun 2026 menandai tonggak sejarah baru dengan berdirinya Akademi Bisnis Kuliner Indonesia Global. Sebagai
            institusi pendidikan tinggi vokasi di bawah naungan Yayasan Sejahtera Indonesia Global, kami berkomitmen
            untuk mencetak profesional kuliner yang tidak hanya mahir secara teknis, tetapi juga tangguh dalam manajemen
            bisnis kuliner.
          </p>
        </div>
      </div>

      <!-- Horizontal Timeline Grid -->
      <div class="history-timeline">
        <div class="history-axis-container">
          <!-- The Line -->
          <div class="history-axis-line"></div>

          <!-- The Milestones -->
          <div class="history-milestones-grid">
            <!-- 2010 -->
            <div class="milestone-col">
              <span class="milestone-year">'10s</span>
              <span class="milestone-title">Pendirian IPS & Fondasi Pendidikan Kuliner</span>
              <p class="milestone-desc">
                Memulai perjalanan sebagai Indonesian Patisserie School, sekolah pastry pertama yang berorientasi pada
                praktik industri nyata dengan standar internasional.
              </p>
            </div>

            <!-- 2015 -->
            <div class="milestone-col">
              <span class="milestone-year">'15s</span>
              <span class="milestone-title">Ekspansi Program & Kemitraan Industri Pertama</span>
              <p class="milestone-desc">
                Memperluas kurikulum dan menjalin kemitraan strategis dengan hotel bintang lima serta brand kuliner
                global untuk menjamin kualitas magang mahasiswa.
              </p>
            </div>

            <!-- 2020 -->
            <div class="milestone-col">
              <span class="milestone-year">'20s</span>
              <span class="milestone-title">Modernisasi Kurikulum & Pencapaian Alumni</span>
              <p class="milestone-desc">
                Melewati masa pandemi dengan kurikulum digital yang inovatif dan berhasil mencetak lebih dari 500 alumni
                yang tersebar di industri kuliner global.
              </p>
            </div>

            <!-- 2026 -->
            <div class="milestone-col">
              <span class="milestone-year">'26s</span>
              <span class="milestone-title">Evolusi Menjadi ABKIG Secara Resmi</span>
              <p class="milestone-desc">
                Resmi bertransformasi menjadi akademi vokasi D3 dengan fokus pada perpaduan kearifan lokal dan standar
                manajemen kuliner kelas dunia.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- =============================================
     VISI & MISI
     ============================================= -->
  <section class="section bg-light" id="visi-misi">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label">Arah &amp; Tujuan</div>
        <h2 class="section-title">Visi &amp; Misi ABKIG</h2>
      </div>
      <div class="visi-misi-grid fade-in">
        <div class="visi-box">
          <h3>Visi</h3>
          <p>
            "Menjadi akademi vokasi kuliner dan bisnis terdepan di Indonesia yang menghasilkan lulusan
            berkompetensi ganda — ahli secara teknis dan tangguh secara bisnis — yang mampu bersaing
            dan berkontribusi di pasar industri kuliner global."
          </p>
        </div>
        <div class="misi-box">
          <h3>Misi</h3>
          <ul class="misi-list">
            <li>Menyelenggarakan pendidikan vokasi kuliner berbasis industri dengan standar internasional</li>
            <li>Mengintegrasikan pendidikan teknis kuliner dengan pemahaman bisnis dan kewirausahaan</li>
            <li>Membangun kemitraan strategis dengan industri untuk membuka jalur karir mahasiswa</li>
            <li>Mendorong inovasi kuliner yang memadukan global excellence dengan kearifan lokal Indonesia</li>
            <li>Mencapai target minimal 80% lulusan terserap industri dalam 6 bulan setelah kelulusan</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
     NILAI-NILAI INTI
     ============================================= -->
  <section class="section bg-white" id="nilai">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label">Nilai Kami</div>
        <h2 class="section-title">Nilai-Nilai Inti ABKIG</h2>
      </div>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;" class="fade-in">
        <div class="nilai-box">
          <h4>🌟 Keunggulan (Excellence)</h4>
          <p>Berkomitmen pada standar kualitas tertinggi dalam setiap aspek pendidikan dan pengajaran.</p>
        </div>
        <div class="nilai-box">
          <h4>💡 Inovasi (Innovation)</h4>
          <p>Terus mengembangkan metode pembelajaran dan kurikulum yang relevan dengan kebutuhan industri terkini.</p>
        </div>
        <div class="nilai-box">
          <h4>🤝 Integritas (Integrity)</h4>
          <p>Menjunjung tinggi kejujuran dan profesionalisme dalam setiap interaksi dengan mahasiswa dan mitra industri.
          </p>
        </div>
        <div class="nilai-box">
          <h4>🌍 Inklusivitas (Inclusivity)</h4>
          <p>Menyediakan akses pendidikan kuliner berkualitas untuk semua kalangan yang memiliki passion dan dedikasi.
          </p>
        </div>
        <div class="nilai-box">
          <h4>🏭 Orientasi Industri (Industry-Oriented)</h4>
          <p>Selalu menyelaraskan program dengan kebutuhan nyata industri kuliner yang terus berkembang.</p>
        </div>
        <div class="nilai-box">
          <h4>🇮🇩 Kebanggaan Lokal (Local Pride)</h4>
          <p>Mengangkat dan mempromosikan kekayaan kuliner Indonesia di panggung internasional.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
     PROFIL LULUSAN
     ============================================= -->
  <section class="section bg-light" id="profil-lulusan">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label">Profil Lulusan</div>
        <h2 class="section-title">5 Profil Lulusan Utama</h2>
        <p class="section-subtitle">ABKIG mencetak lulusan dengan kompetensi beragam untuk memenuhi kebutuhan industri
          kuliner modern</p>
      </div>

      <div class="profil-lulusan-grid">
        <div class="profil-card fade-in">
          <span class="profil-icon">👨‍🍳</span>
          <h4>Pastry &amp; Bakery Chef</h4>
          <p>Chef pastry profesional di hotel bintang, restoran fine dining, dan kafe premium</p>
        </div>
        <div class="profil-card fade-in fade-in-delay-1">
          <span class="profil-icon">🏪</span>
          <h4>Wirausahawan Kuliner</h4>
          <p>Pemilik dan pengelola usaha kuliner mandiri yang profitable dan berkelanjutan</p>
        </div>
        <div class="profil-card fade-in fade-in-delay-2">
          <span class="profil-icon">📊</span>
          <h4>Food Business Manager</h4>
          <p>Manajer operasional di perusahaan F&amp;B, katering, dan industri makanan olahan</p>
        </div>
        <div class="profil-card fade-in fade-in-delay-3">
          <span class="profil-icon">🧪</span>
          <h4>Product Developer</h4>
          <p>Pengembang produk kuliner baru di perusahaan FMCG dan industri makanan &amp; minuman</p>
        </div>
        <div class="profil-card fade-in fade-in-delay-4">
          <span class="profil-icon">📝</span>
          <h4>Culinary Educator</h4>
          <p>Instruktur dan pengajar di lembaga pendidikan kuliner atau mentor komunitas memasak</p>
        </div>
      </div>

      <!-- Target Achievement -->
      <div
        style="margin-top:60px;background:linear-gradient(135deg,var(--navy),var(--navy-dark));border-radius:var(--border-radius-lg);padding:40px;text-align:center;"
        class="fade-in">
        <div
          style="color:var(--gold);font-size:4rem;font-weight:800;font-family:var(--font-heading);margin-bottom:8px;">
          80%</div>
        <h3 style="color:var(--white);margin-bottom:12px;">Target Serapan Lulusan dalam 6 Bulan</h3>
        <p style="color:rgba(255,255,255,0.75);max-width:500px;margin:0 auto;text-align:justify;">
          ABKIG berkomitmen bahwa minimal 80% lulusan terserap oleh industri dalam waktu 6 bulan setelah kelulusan,
          didukung oleh jaringan kemitraan industri yang luas dan program persiapan karir yang komprehensif.
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section cta-section">
    <div class="container">
      <div class="cta-content">
        <h2 style="color:var(--white);">Tertarik Bergabung dengan ABKIG?</h2>
        <p>Hubungi kami untuk informasi pendaftaran dan jadwal open house.</p>
        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
          <a href="contact.php#daftar" class="btn btn-gold btn-lg">Daftar Sekarang</a>
          <a href="program.php" class="btn hero-btn-outline btn-lg">Lihat Program</a>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  <script src="assets/js/main.js"></script>
</body>

</html>