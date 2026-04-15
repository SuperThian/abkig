<?php
/**
 * ABKIG - Academic / Kurikulum Page
 */
$currentPage = 'academic';
$baseUrl = '';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Kurikulum dan Akademik ABKIG — Detail 6 semester, 109 SKS, pilar kurikulum, dan program magang industri.">
  <title>Kurikulum &amp; Akademik — ABKIG</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
  <div class="container">
    <div class="page-hero-content">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="index.php">Home</a>
        <span class="separator">›</span>
        <span class="current">Kurikulum &amp; Akademik</span>
      </nav>
      <h1>Kurikulum &amp; Akademik</h1>
      <p style="color:rgba(255,255,255,0.75);max-width:560px;margin-top:12px;">
        Eksplorasi kurikulum komprehensif ABKIG yang dirancang bersama industri untuk memastikan relevansi dan kesiapan kerja lulusan.
      </p>
    </div>
  </div>
</section>

<!-- =============================================
     OVERVIEW KURIKULUM
     ============================================= -->
<section class="section bg-white" id="overview">
  <div class="container">
    <div class="section-header text-center">
      <div class="section-label">Gambaran Umum</div>
      <h2 class="section-title">Kurikulum D3 Pastry &amp; Culinary Business</h2>
      <p class="section-subtitle">6 Semester · ±109 SKS · 67% Praktik · 12 SKS Magang Industri</p>
    </div>

    <!-- Stats Bar -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:60px;" class="fade-in">
      <div style="background:linear-gradient(135deg,var(--navy),var(--navy-dark));border-radius:var(--border-radius);padding:28px;text-align:center;">
        <div style="color:var(--gold);font-size:2.5rem;font-weight:800;font-family:var(--font-heading);">109</div>
        <div style="color:rgba(255,255,255,0.75);font-size:0.875rem;margin-top:4px;">Total SKS</div>
      </div>
      <div style="background:linear-gradient(135deg,#1a6b4a,#28a070);border-radius:var(--border-radius);padding:28px;text-align:center;">
        <div style="color:var(--gold);font-size:2.5rem;font-weight:800;font-family:var(--font-heading);">6</div>
        <div style="color:rgba(255,255,255,0.75);font-size:0.875rem;margin-top:4px;">Semester</div>
      </div>
      <div style="background:linear-gradient(135deg,#8B1A1A,#b52828);border-radius:var(--border-radius);padding:28px;text-align:center;">
        <div style="color:var(--gold);font-size:2.5rem;font-weight:800;font-family:var(--font-heading);">67%</div>
        <div style="color:rgba(255,255,255,0.75);font-size:0.875rem;margin-top:4px;">Bobot Praktik</div>
      </div>
      <div style="background:linear-gradient(135deg,#5a3e8b,#7a5ab0);border-radius:var(--border-radius);padding:28px;text-align:center;">
        <div style="color:var(--gold);font-size:2.5rem;font-weight:800;font-family:var(--font-heading);">12</div>
        <div style="color:rgba(255,255,255,0.75);font-size:0.875rem;margin-top:4px;">SKS Magang</div>
      </div>
    </div>

    <!-- 4 Pilar -->
    <div class="section-header">
      <div class="section-label">4 Pilar Kurikulum</div>
      <h3 class="section-title">Fondasi Pembelajaran ABKIG</h3>
    </div>

    <div class="kurikulum-pillar-grid fade-in">
      <div class="pillar-card pillar-1">
        <div class="pillar-num">1</div>
        <span class="pillar-icon">🧱</span>
        <h4>Pilar Fundamental</h4>
        <ul>
          <li>Dasar Baking &amp; Pastry</li>
          <li>Pengenalan Bahan Pangan</li>
          <li>Food Safety &amp; Hygiene</li>
          <li>Pengantar Bisnis Kuliner</li>
          <li>Komunikasi Profesional</li>
          <li>Matematika Bisnis</li>
        </ul>
      </div>
      <div class="pillar-card pillar-2">
        <div class="pillar-num">2</div>
        <span class="pillar-icon">💼</span>
        <h4>Pilar Bisnis</h4>
        <ul>
          <li>Manajemen Usaha Kuliner</li>
          <li>Marketing Digital F&amp;B</li>
          <li>Manajemen Keuangan Dasar</li>
          <li>Perencanaan Bisnis Kuliner</li>
          <li>Kewirausahaan Kuliner</li>
          <li>Hukum Usaha &amp; Perizinan</li>
        </ul>
      </div>
      <div class="pillar-card pillar-3">
        <div class="pillar-num">3</div>
        <span class="pillar-icon">🔧</span>
        <h4>Pilar Teknis Lanjutan</h4>
        <ul>
          <li>Pastry &amp; Cake Decorating Advanced</li>
          <li>Pembuatan Roti Artisan</li>
          <li>Pengembangan Menu</li>
          <li>Inovasi Produk Kuliner</li>
          <li>Kuliner Indonesia &amp; Internasional</li>
          <li>Photografi Kuliner &amp; Plating</li>
        </ul>
      </div>
      <div class="pillar-card pillar-4">
        <div class="pillar-num">4</div>
        <span class="pillar-icon">🌟</span>
        <h4>Pilar Spesialisasi &amp; Industri</h4>
        <ul>
          <li>Magang Industri (12 SKS)</li>
          <li>Manajemen Event Kuliner</li>
          <li>Supply Chain Kuliner</li>
          <li>Tugas Akhir Business Project</li>
          <li>Persiapan Karir &amp; Wirausaha</li>
          <li>Sertifikasi Kompetensi</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     TIMELINE SEMESTER
     ============================================= -->
<section class="section bg-light" id="semester">
  <div class="container">
    <div class="section-header">
      <div class="section-label">Timeline Belajar</div>
      <h2 class="section-title">Perjalanan 6 Semester</h2>
      <p class="section-subtitle" style="max-width:none;">Setiap semester dirancang dengan cermat untuk membangun kompetensi mahasiswa secara progresif dan terintegrasi.</p>
    </div>

    <div class="semester-timeline fade-in">
      <div class="semester-item">
        <span class="semester-num">Semester 1 — Tahun I</span>
        <h4>Fondasi Kuliner &amp; Bisnis</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Membangun pemahaman dasar tentang dunia kuliner profesional dan bisnis. Mahasiswa dikenalkan dengan kitchen tools, food safety, dan dasar kewirausahaan.</p>
        <div class="semester-courses">
          <span class="course-chip">Pengantar Ilmu Pangan</span>
          <span class="course-chip">Dasar Baking &amp; Pastry</span>
          <span class="course-chip">Food Safety &amp; Hygiene</span>
          <span class="course-chip">Pengantar Bisnis</span>
          <span class="course-chip">Komunikasi Profesional</span>
          <span class="course-chip">Matematika Bisnis</span>
        </div>
      </div>

      <div class="semester-item">
        <span class="semester-num">Semester 2 — Tahun I</span>
        <h4>Pengembangan Teknis &amp; Bisnis Dasar</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Mengembangkan keahlian teknis pastry lebih lanjut sambil mulai mempelajari fondasi manajemen usaha kuliner dan pemasaran dasar.</p>
        <div class="semester-courses">
          <span class="course-chip">Pastry Techniques Intermediate</span>
          <span class="course-chip">Baking Science</span>
          <span class="course-chip">Manajemen Usaha Kuliner</span>
          <span class="course-chip">Marketing F&amp;B Dasar</span>
          <span class="course-chip">Akuntansi Biaya Kuliner</span>
          <span class="course-chip">Kuliner Indonesia</span>
        </div>
      </div>

      <div class="semester-item">
        <span class="semester-num">Semester 3 — Tahun II</span>
        <h4>Teknis Advanced &amp; Inovasi Produk</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Mendalami teknik pastry dan bakery tingkat lanjut, mulai mengembangkan kreativitas dalam penciptaan produk baru yang inovatif.</p>
        <div class="semester-courses">
          <span class="course-chip">Advanced Cake Decorating</span>
          <span class="course-chip">Artisan Bread Making</span>
          <span class="course-chip">Inovasi Produk Kuliner</span>
          <span class="course-chip">Marketing Digital F&amp;B</span>
          <span class="course-chip">Pengembangan Menu</span>
          <span class="course-chip">Kuliner Internasional</span>
        </div>
      </div>

      <div class="semester-item">
        <span class="semester-num">Semester 4 — Tahun II</span>
        <h4>Manajemen Bisnis &amp; Kewirausahaan</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Fokus pada aspek bisnis dan kewirausahaan kuliner. Mahasiswa mulai merancang business plan dan mempelajari aspek legal usaha kuliner.</p>
        <div class="semester-courses">
          <span class="course-chip">Business Plan Kuliner</span>
          <span class="course-chip">Manajemen Keuangan</span>
          <span class="course-chip">Kewirausahaan Kuliner</span>
          <span class="course-chip">Event Management Kuliner</span>
          <span class="course-chip">Food Photography &amp; Plating</span>
          <span class="course-chip">Hukum Usaha &amp; Perizinan</span>
        </div>
      </div>

      <div class="semester-item">
        <span class="semester-num">Semester 5 — Tahun III</span>
        <h4>Spesialisasi &amp; Magang Industri</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Semester magang penuh di mitra industri ABKIG (12 SKS). Mahasiswa mendapatkan pengalaman kerja nyata di hotel, restoran, atau perusahaan F&B profesional.</p>
        <div class="semester-courses">
          <span class="course-chip">Magang Industri (12 SKS)</span>
          <span class="course-chip">Laporan Magang</span>
          <span class="course-chip">Monitoring &amp; Evaluasi</span>
        </div>
      </div>

      <div class="semester-item">
        <span class="semester-num">Semester 6 — Tahun III</span>
        <h4>Tugas Akhir &amp; Persiapan Karir</h4>
        <p style="font-size:0.875rem;margin-bottom:12px;">Mahasiswa menyelesaikan tugas akhir berbasis proyek bisnis nyata dan mempersiapkan diri memasuki dunia kerja atau memulai wirausaha mandiri.</p>
        <div class="semester-courses">
          <span class="course-chip">Supply Chain Kuliner</span>
          <span class="course-chip">Manajemen Restoran</span>
          <span class="course-chip">Tugas Akhir / Business Project</span>
          <span class="course-chip">Persiapan Karir</span>
          <span class="course-chip">Sertifikasi Kompetensi</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     PROGRAM MAGANG
     ============================================= -->
<section class="section bg-white" id="magang">
  <div class="container">
    <div class="section-header text-center">
      <div class="section-label">Magang Industri</div>
      <h2 class="section-title">Program Magang Terstruktur (12 SKS)</h2>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:start;" class="fade-in">
      <div>
        <p style="margin-bottom:20px;">
          Program magang ABKIG adalah salah satu keunggulan terbesar kami. Mahasiswa menghabiskan satu semester
          penuh (12 SKS setara ±6 bulan) bekerja di mitra industri pilihan, mendapatkan pengalaman kerja nyata
          yang tidak bisa didapatkan di ruang kelas.
        </p>
        <div class="highlight-box" style="margin-bottom:24px;">
          <p>Magang bukan sekadar formalitas — ini adalah pintu masuk langsung ke karir profesional Anda.</p>
        </div>
        <h4 style="margin-bottom:16px;">Mitra Magang ABKIG:</h4>
        <ul style="display:flex;flex-direction:column;gap:10px;">
          <li style="display:flex;gap:10px;align-items:center;font-size:0.9rem;color:var(--gray-600);">
            <span style="color:var(--gold);font-size:1rem;">🏨</span> Hotel Bintang 4 &amp; 5 (Novotel, Marriott, Sheraton, dll.)
          </li>
          <li style="display:flex;gap:10px;align-items:center;font-size:0.9rem;color:var(--gray-600);">
            <span style="color:var(--gold);font-size:1rem;">🍽️</span> Restoran Fine Dining &amp; Casual Dining Internasional
          </li>
          <li style="display:flex;gap:10px;align-items:center;font-size:0.9rem;color:var(--gray-600);">
            <span style="color:var(--gold);font-size:1rem;">🏭</span> Perusahaan FMCG Food &amp; Bakery (Blue Band, dsb.)
          </li>
          <li style="display:flex;gap:10px;align-items:center;font-size:0.9rem;color:var(--gray-600);">
            <span style="color:var(--gold);font-size:1rem;">🎂</span> Artisan Bakery &amp; Pastry Boutique Premium</li>
          <li style="display:flex;gap:10px;align-items:center;font-size:0.9rem;color:var(--gray-600);">
            <span style="color:var(--gold);font-size:1rem;">📦</span> Catering &amp; Event Organizer Skala Nasional
          </li>
        </ul>
      </div>

      <div style="display:flex;flex-direction:column;gap:16px;">
        <div style="background:var(--light-gray);border-radius:var(--border-radius);padding:28px;border:1px solid var(--gray-200);">
          <h4 style="margin-bottom:16px;color:var(--navy);">📋 Alur Program Magang</h4>
          <div style="display:flex;flex-direction:column;gap:12px;">
            <?php
            $steps = [
              ['1', 'Orientasi & Pembekalan', 'Persiapan magang, briefing industri, penentuan lokasi magang'],
              ['2', 'Penempatan di Mitra', 'Penempatan mahasiswa di tempat magang sesuai minat dan kompetensi'],
              ['3', 'Pelaksanaan Magang', 'Bekerja selama ±6 bulan di bawah supervisi mentor industri dan dosen pembimbing'],
              ['4', 'Evaluasi &amp; Laporan', 'Penilaian kinerja oleh mitra industri dan penyusunan laporan magang'],
            ];
            foreach ($steps as $step): ?>
              <div style="display:flex;gap:12px;align-items:flex-start;">
                <div style="min-width:28px;height:28px;background:var(--navy);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:0.75rem;font-weight:700;flex-shrink:0;"><?= $step[0] ?></div>
                <div>
                  <div style="font-weight:600;font-size:0.9rem;color:var(--navy);margin-bottom:2px;"><?= $step[1] ?></div>
                  <div style="font-size:0.8rem;color:var(--gray-600);"><?= $step[2] ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div style="background:linear-gradient(135deg,var(--navy),var(--navy-dark));border-radius:var(--border-radius);padding:28px;text-align:center;">
          <div style="color:var(--gold);font-size:2.5rem;font-weight:800;font-family:var(--font-heading);">80%</div>
          <div style="color:rgba(255,255,255,0.85);font-size:0.9rem;margin-top:4px;">Lulusan terserap industri</div>
          <div style="color:rgba(255,255,255,0.6);font-size:0.8rem;margin-top:4px;">dalam 6 bulan setelah lulus</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section cta-section">
  <div class="container">
    <div class="cta-content">
      <h2 style="color:var(--white);">Mulai Perjalanan Akademik Anda</h2>
      <p>Bergabunglah dengan ABKIG dan rasakan pengalaman belajar kuliner yang sesungguhnya.</p>
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
