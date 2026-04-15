<?php
/**
 * ABKIG - Home Page (Upgraded)
 */
$currentPage = 'home';
$baseUrl = '';
require_once 'includes/functions.php';
$latestNews = getLatestNews(3);

/* ─── Flexible image scanner ───────────────────── */
function findImage($baseName)
{
  $exts = ['jpg', 'jpeg', 'png', 'webp', 'JPG', 'PNG'];
  $bases = [
    __DIR__ . '/asset/image/' . $baseName,
    __DIR__ . '/../AkademiBusinessGlobal/asset/image/' . $baseName,
  ];
  foreach ($bases as $base) {
    foreach ($exts as $ext) {
      if (file_exists($base . '.' . $ext)) {
        return 'asset/image/' . $baseName . '.' . $ext;
      }
    }
  }
  return null;
}

$foto2 = findImage('foto2');
$foto3 = findImage('foto3');

function getImages(string $folder, int $max = 20): array
{
  $base = __DIR__ . '/' . $folder;
  if (!is_dir($base)) {
    $base = dirname(__DIR__) . '/' . $folder;
  }
  $files = glob($base . '/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}', GLOB_BRACE);
  if (!$files)
    return [];
  // exclude the logo file
  $files = array_filter($files, fn($f) => stripos(basename($f), 'logo') === false);
  $files = array_values($files);
  shuffle($files);
  $web = $folder . '/';
  return array_map(fn($f) => $web . basename($f), array_slice($files, 0, $max));
}

$all_photos = getImages('asset/image');          // all usable photos
$hero_photo = $all_photos[0] ?? null;           // hero right column
$about_photos = array_slice($all_photos, 0, 2);  // about snippet stacked
$prog_photos = $all_photos;                      // program cards (cycle with modulo)
$news_photos = $all_photos;                      // news fallback thumbnails
$gallery_photos = array_slice($all_photos, 0, 9); // masonry gallery

/* fallback color sets when no photo available */
$prog_fallbacks = [
  'linear-gradient(145deg,#0F3C91,#1a4db0)',
  'linear-gradient(145deg,#1a6b4a,#28a070)',
  'linear-gradient(145deg,#8B4513,#A0522D)',
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Akademi Bisnis Kuliner Indonesia Global (ABKIG) — Akademi vokasi pertama di Indonesia yang mengintegrasikan keahlian teknis kuliner dengan kemampuan bisnis nyata.">
  <meta name="keywords" content="akademi kuliner, pastry school, bisnis kuliner, ABKIG, vokasi kuliner jakarta">
  <meta property="og:title" content="ABKIG — Transformasi Pendidikan Kuliner Berbasis Industri">
  <meta property="og:description" content="Program D3, D1, dan Short Course kuliner profesional di Jakarta.">
  <meta property="og:image" content="<?= $hero_photo ? e($hero_photo) : 'asset/image/ABKIG Logo.png' ?>">
  <title>ABKIG — Transformasi Pendidikan Kuliner Berbasis Industri</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="page-has-hero">

  <?php include 'includes/navbar.php'; ?>

  <!-- =============================================
     HERO — SPLIT TWO COLUMN
     ============================================= -->
  <section class="hero hero-split" id="hero" aria-label="Hero section">

    <!-- ─ Left Column ─ -->
    <div class="hero-left">
      <!-- decorative diagonal lines -->
      <div class="hero-diagonals" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span>
      </div>
      <div class="hero-bg-pattern" aria-hidden="true"></div>

      <div class="hero-content">
        <div class="hero-label fade-in">
          <span></span>
          Akademi Vokasi Kuliner &amp; Bisnis
        </div>

        <h1 class="hero-title fade-in fade-in-delay-1">
          Transformasi Pendidikan
          <em class="accent">Kuliner Berbasis Industri</em>
        </h1>

        <p class="hero-subtitle fade-in fade-in-delay-2" style="text-align: justify;">
          Akademi vokasi pertama di Indonesia yang mengintegrasikan keahlian teknis kuliner
          dengan kemampuan bisnis nyata. Siapkan diri Anda untuk karir dan wirausaha di industri kuliner global.
        </p>

        <div class="hero-actions fade-in fade-in-delay-3">
          <a href="program.php" class="btn btn-gold btn-lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
            Lihat Program
          </a>
          <a href="about.php" class="btn hero-btn-outline btn-lg">
            Tentang Kami <span style="margin-left:4px;">→</span>
          </a>
        </div>
      </div>
    </div>

    <!-- ─ Right Column ─ -->
    <div class="hero-right">
      <?php if ($hero_photo): ?>
        <img src="<?= e($hero_photo) ?>" alt="Mahasiswa ABKIG praktik di dapur profesional" class="hero-img"
          loading="eager" decoding="async">
      <?php else: ?>
        <!-- Fallback: illustrated placeholder -->
        <div class="hero-img-fallback" aria-hidden="true">
          <div class="hero-fallback-inner">
            <span style="font-size:5rem;">🍰</span>
            <p style="color:rgba(255,255,255,0.5);margin-top:8px;font-size:0.9rem;">Dapur Profesional ABKIG</p>
          </div>
        </div>
      <?php endif; ?>

      <!-- Left-fade overlay → menyatu dengan kolom navy -->
      <div class="hero-img-fade" aria-hidden="true"></div>
    </div>

    <!-- Scroll hint -->
    <div class="hero-scroll-hint" aria-hidden="true">
      <div class="scroll-arrow"></div>
      <span>Scroll</span>
    </div>
  </section>

  <!-- =============================================
     STATS SECTION (upgraded cards)
     ============================================= -->
  <!-- =============================================
     SECTION 2: TENTANG KAMI
     ============================================= -->
  <section class="section about-section-new" id="about" aria-label="Tentang ABKIG">
    <div class="container">
      <div class="about-split-new">

        <!-- Kiri: Foto Stack -->
        <div class="about-column-left fade-in">
          <div class="about-photo-wrapper">
            <!-- Foto Belakang / Utama -->
            <div class="about-img-container main">
              <?php if ($foto2): ?>
                <img src="<?= e($foto2) ?>" alt="Akademi ABKIG" class="about-img-main">
              <?php else: ?>
                <div class="about-img-placeholder">Foto tidak ditemukan</div>
              <?php endif; ?>
            </div>

            <!-- Foto Depan / Kecil -->
            <div class="about-img-container sub">
              <?php if ($foto3): ?>
                <img src="<?= e($foto3) ?>" alt="Praktik ABKIG" class="about-img-sub">
              <?php else: ?>
                <div class="about-img-placeholder small">Foto tidak ditemukan</div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- Kanan: Konten Teks -->
        <div class="about-column-right fade-in">
          <div class="about-label-wrapper">
            <span class="about-accent-line"></span>
            <span class="about-label-text">TENTANG KAMI</span>
          </div>

          <h2 class="about-heading">Lebih dari Sekadar<br>Sekolah Kuliner</h2>

          <div class="about-title-accent"></div>

          <p class="about-description" style="text-align: justify;">
            Akademi Bisnis Kuliner Indonesia Global (ABKIG) adalah institusi pendidikan tinggi vokasi di bawah Yayasan
            Sejahtera Indonesia Global, dibangun di atas fondasi lebih dari satu dekade pengalaman melalui Indonesia
            Patisserie School sejak 2010.
          </p>

          <div class="about-points-list">
            <div class="about-point-item">
              <div class="point-icon-box">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#F48323" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </div>
              <span class="point-text">500+ alumni dengan rekam jejak industri nyata</span>
            </div>
            <div class="about-point-item">
              <div class="point-icon-box">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#F48323" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </div>
              <span class="point-text">Kurikulum 67% praktik berbasis standar KKNI Level 5</span>
            </div>
            <div class="about-point-item">
              <div class="point-icon-box">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#F48323" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </div>
              <span class="point-text">Berlokasi di Pantai Indah Kapuk, Jakarta Utara</span>
            </div>
          </div>

          <a href="about.php" class="about-btn-more">Selengkapnya <span class="btn-arrow">→</span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
     SECTION 3: MENGAPA PILIH KAMI
     ============================================= -->
  <section class="section" id="why-us" style="background:#F8F9FB;" aria-label="Keunggulan Kami">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label" style="color:var(--orange);">KEUNGGULAN KAMI</div>
        <h2 class="section-title">Mengapa Pilih ABKIG?</h2>
      </div>

      <div class="keunggulan-grid-v2">
        <!-- Card 1 -->
        <div class="keunggulan-card-v2 fade-in">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M6 13.87A4 4 0 0 1 7.41 6.34 4.11 4.11 0 0 1 12 3a4.1 4.1 0 0 1 4.59 3.34 4 4 0 0 1 1.41 7.53l-.9 5.33a1 1 0 0 1-1 1h-8.2a1 1 0 0 1-1-1z" />
              <path d="M9 13v1" />
              <path d="M15 13v1" />
            </svg>
          </div>
          <h3 class="keunggulan-title">Fondasi Industri Terbukti</h3>
          <p class="keunggulan-desc">Dikembangkan dari Indonesia Patisserie School dengan 500+ alumni dan bisnis nyata
            sejak 2010.</p>
        </div>
        <!-- Card 2 -->
        <div class="keunggulan-card-v2 fade-in fade-in-delay-1">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0" />
              <path d="M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2" />
              <path d="M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8" />
              <path
                d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15" />
            </svg>
          </div>
          <h3 class="keunggulan-title">67% Praktik Langsung</h3>
          <p class="keunggulan-desc">Fokus pada hands-on learning berbasis produksi nyata, bukan sekadar teori.</p>
        </div>
        <!-- Card 3 -->
        <div class="keunggulan-card-v2 fade-in fade-in-delay-2">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
            </svg>
          </div>
          <h3 class="keunggulan-title">Kompetensi Ganda</h3>
          <p class="keunggulan-desc">Mahasiswa dilatih menjadi chef sekaligus pebisnis — dari produksi, costing, hingga
            manajemen operasional.</p>
        </div>
        <!-- Card 4 -->
        <div class="keunggulan-card-v2 fade-in fade-in-delay-3">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10" />
              <line x1="2" y1="12" x2="22" y2="12" />
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
            </svg>
          </div>
          <h3 class="keunggulan-title">Integrasi Global & Lokal</h3>
          <p class="keunggulan-desc">Teknik internasional dikombinasikan dengan inovasi berbasis cita rasa Nusantara.
          </p>
        </div>
        <!-- Card 5 -->
        <div class="keunggulan-card-v2 fade-in fade-in-delay-4">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
              <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
              <path d="M4 22h16" />
              <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
              <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
              <path d="M18 2H6v7a6 6 0 0 0 12 0V2z" />
            </svg>
          </div>
          <h3 class="keunggulan-title">Jalur Industri Terstruktur</h3>
          <p class="keunggulan-desc">Transisi terintegrasi dari pembelajaran ke praktik industri profesional dengan
            program magang 12 SKS.</p>
        </div>
        <!-- Card 6 -->
        <div class="keunggulan-card-v2 fade-in fade-in-delay-5">
          <div class="keunggulan-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              <path d="M9 12l2 2 4-4" />
            </svg>
          </div>
          <h3 class="keunggulan-title">Akreditasi & Standar Nasional</h3>
          <p class="keunggulan-desc">Program D3 disusun sesuai standar KKNI Level 5 dan SN-Dikti.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
     SECTION 4: PROGRAM (Photo Grid Layout)
     ============================================= -->
  <?php
  if (!function_exists('findImg')) {
    function findImg($name)
    {
      $exts = ['jpg', 'jpeg', 'png', 'webp', 'JPG', 'PNG', 'JPEG'];
      $dirs = [
        __DIR__ . '/asset/image/',
        __DIR__ . '/../AkademiBusinessGlobal/asset/image/',
      ];
      foreach ($dirs as $dir) {
        foreach ($exts as $ext) {
          if (file_exists($dir . $name . '.' . $ext)) {
            return 'asset/image/' . $name . '.' . $ext;
          }
        }
      }
      return null;
    }
  }
  $foto_program1 = findImg('foto1');
  $foto_program2 = findImg('foto4');
  $foto_program3 = findImg('foto5');
  if (!$foto_program1)
    $foto_program1 = $all_photos[0] ?? null;
  if (!$foto_program2)
    $foto_program2 = $all_photos[1] ?? $all_photos[0] ?? null;
  if (!$foto_program3)
    $foto_program3 = $all_photos[2] ?? $all_photos[0] ?? null;
  ?>
  <section class="section bg-white" id="programs" aria-label="Program Studi">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label" style="color:var(--orange);">PROGRAM STUDI</div>
        <h2 class="section-title">Pilih Program yang Tepat untuk Anda</h2>
      </div>

      <!-- Photo Grid -->
      <div class="prog-photo-grid fade-in">

        <!-- KOLOM KIRI: 1 kartu besar -->
        <div class="prog-photo-card prog-photo-card--large">
          <?php if ($foto_program1): ?>
            <img src="<?= e($foto_program1) ?>" alt="Program Pendidikan ABKIG" loading="eager">
          <?php else: ?>
            <div class="prog-photo-fallback" style="background:linear-gradient(145deg,#0F3C91,#1a4db0);"></div>
          <?php endif; ?>
          <div class="prog-photo-overlay"></div>
          <div class="prog-photo-content">
            <h3 class="prog-photo-title prog-photo-title--lg">Diploma III (D3) Pastry & Culinary Business</h3>
            <a href="program.php" class="prog-photo-btn">Selengkapnya</a>
          </div>
        </div>

        <!-- KOLOM KANAN: 2 kartu ditumpuk -->
        <div class="prog-photo-col-right">

          <!-- Kartu Kanan Atas -->
          <div class="prog-photo-card">
            <?php if ($foto_program2): ?>
              <img src="<?= e($foto_program2) ?>" alt="Program Internasional ABKIG" loading="lazy">
            <?php else: ?>
              <div class="prog-photo-fallback" style="background:linear-gradient(145deg,#1a6b4a,#28a070);"></div>
            <?php endif; ?>
            <div class="prog-photo-overlay"></div>
            <div class="prog-photo-content">
              <h3 class="prog-photo-title">Diploma I (D1)</h3>
              <a href="program.php#internasional" class="prog-photo-btn">Selengkapnya</a>
            </div>
          </div>

          <!-- Kartu Kanan Bawah -->
          <div class="prog-photo-card">
            <?php if ($foto_program3): ?>
              <img src="<?= e($foto_program3) ?>" alt="Beasiswa ABKIG" loading="lazy">
            <?php else: ?>
              <div class="prog-photo-fallback" style="background:linear-gradient(145deg,#8B4513,#A0522D);"></div>
            <?php endif; ?>
            <div class="prog-photo-overlay"></div>
            <div class="prog-photo-content">
              <h3 class="prog-photo-title">Program Short Course</h3>
              <a href="program.php#beasiswa" class="prog-photo-btn">Selengkapnya</a>
            </div>
          </div>

        </div><!-- /col-right -->
      </div><!-- /prog-photo-grid -->
    </div>
  </section>

  <style>
    /* Program Photo Grid */
    .prog-photo-grid {
      display: grid;
      grid-template-columns: 55fr 45fr;
      grid-template-rows: 560px;
      gap: 16px;
    }

    .prog-photo-col-right {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .prog-photo-card {
      position: relative;
      overflow: hidden;
      border-radius: 20px;
      cursor: pointer;
      flex: 1;
    }

    .prog-photo-card--large {
      height: 100%;
    }

    .prog-photo-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
    }

    .prog-photo-card:hover img {
      transform: scale(1.05);
    }

    .prog-photo-fallback {
      width: 100%;
      height: 100%;
    }

    .prog-photo-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(15, 60, 145, 0.85) 0%, rgba(15, 60, 145, 0.15) 55%, transparent 100%);
      pointer-events: none;
    }

    .prog-photo-content {
      position: absolute;
      bottom: 28px;
      left: 28px;
      right: 28px;
      pointer-events: none;
    }

    .prog-photo-title {
      font-size: 22px;
      font-weight: 700;
      color: #fff;
      font-family: 'Playfair Display', Georgia, serif;
      margin: 0 0 14px 0;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
      line-height: 1.25;
    }

    .prog-photo-title--lg {
      font-size: 26px;
    }

    .prog-photo-btn {
      display: inline-block;
      background: #FAAE1D;
      color: #0F3C91;
      font-weight: 600;
      font-size: 14px;
      padding: 10px 22px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      text-decoration: none;
      pointer-events: auto;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .prog-photo-btn:hover {
      background: #F48323;
      transform: translateY(-2px);
      color: #fff;
      text-decoration: none;
    }

    @media (max-width: 1024px) {
      .prog-photo-grid {
        grid-template-rows: 460px;
      }
    }

    @media (max-width: 768px) {
      .prog-photo-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 16px;
      }

      .prog-photo-card--large {
        height: 280px;
      }

      .prog-photo-col-right .prog-photo-card {
        height: 280px;
        flex: none;
      }
    }
  </style>

  <!-- =============================================
     SECTION 5: TESTIMONI / ALUMNI (Carousel)
     ============================================= -->
  <section class="section" id="testimonials" style="background:var(--navy);" aria-label="Testimoni Alumni">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label" style="color:var(--gold);">TESTIMONI</div>
        <h2 class="section-title" style="color:white;">Kata Mereka yang Sudah Bergabung</h2>
      </div>

      <!-- Carousel Wrapper -->
      <div class="testi-carousel-wrapper">
        <!-- Prev Button -->
        <button class="testi-arrow testi-arrow--prev" id="testiPrev" aria-label="Testimoni sebelumnya">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6" />
          </svg>
        </button>

        <!-- Track -->
        <div class="testi-track-outer">
          <div class="testi-track" id="testiTrack">
            <?php
            $dbTestimonials = getTestimonials();
            if (!empty($dbTestimonials)):
              foreach ($dbTestimonials as $t):
            ?>
              <!-- Testi -->
              <div class="testimonial-card">
                <div class="testimonial-quote-icon">"</div>
                <p class="testimonial-text"><?= e($t['content']) ?></p>
                <div class="testimonial-author">
                  <div class="testimonial-info">
                    <span class="testimonial-name"><?= e($t['name']) ?></span>
                    <?php if (!empty($t['role'])): ?>
                      <span class="testimonial-role"><?= e($t['role']) ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php 
              endforeach; 
            else:
            ?>
              <div class="testimonial-card" style="width:100%; border:none; background:none; box-shadow:none;">
                <p style="color:white; text-align:center;">Belum ada testimoni.</p>
              </div>
            <?php endif; ?>
          </div><!-- /testi-track -->
        </div><!-- /testi-track-outer -->

        <!-- Next Button -->
        <button class="testi-arrow testi-arrow--next" id="testiNext" aria-label="Testimoni berikutnya">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6" />
          </svg>
        </button>
      </div><!-- /testi-carousel-wrapper -->

      <!-- Dots -->
      <div class="testi-dots" id="testiDots" aria-label="Navigasi testimoni"></div>

    </div>
  </section>

  <style>
    /* ─── Testimonial Carousel ──────────────────────────── */
    .testi-carousel-wrapper {
      position: relative;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .testi-track-outer {
      overflow: hidden;
      width: 100%;
    }

    .testi-track {
      display: flex;
      gap: 24px;
      transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform;
    }

    .testi-track .testimonial-card {
      flex: 0 0 calc((100% - 48px) / 3);
      min-width: 0;
      /* reset any old fade-in so carousel controls visibility */
      opacity: 1 !important;
      transform: none !important;
    }

    /* Arrow Buttons */
    .testi-arrow {
      flex-shrink: 0;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      border: 2px solid rgba(255, 255, 255, 0.25);
      background: rgba(255, 255, 255, 0.08);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: background 0.2s, border-color 0.2s, transform 0.2s;
      z-index: 2;
    }

    .testi-arrow:hover {
      background: var(--gold, #FAAE1D);
      border-color: var(--gold, #FAAE1D);
      color: var(--navy, #0F3C91);
      transform: scale(1.1);
    }

    .testi-arrow:disabled {
      opacity: 0.3;
      cursor: not-allowed;
      transform: none;
    }

    /* Dots */
    .testi-dots {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 32px;
    }

    .testi-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      border: none;
      cursor: pointer;
      transition: background 0.3s, transform 0.3s, width 0.3s;
      padding: 0;
    }

    .testi-dot.active {
      background: var(--gold, #FAAE1D);
      width: 24px;
      border-radius: 4px;
      transform: none;
    }

    /* Tablet */
    @media (max-width: 1024px) {
      .testi-track .testimonial-card {
        flex: 0 0 calc((100% - 24px) / 2);
      }
    }

    /* Mobile */
    @media (max-width: 640px) {
      .testi-track .testimonial-card {
        flex: 0 0 100%;
      }

      .testi-arrow {
        width: 40px;
        height: 40px;
      }
    }
  </style>

  <script>
    (function () {
      const track = document.getElementById('testiTrack');
      const dotsEl = document.getElementById('testiDots');
      const btnPrev = document.getElementById('testiPrev');
      const btnNext = document.getElementById('testiNext');
      if (!track) return;

      const cards = Array.from(track.children);
      const total = cards.length;
      let current = 0;
      let autoTimer = null;
      const AUTO_DELAY = 4500;

      /* how many cards visible at once */
      function visible() {
        if (window.innerWidth <= 640) return 1;
        if (window.innerWidth <= 1024) return 2;
        return 3;
      }

      /* max index we can reach */
      function maxIndex() { return Math.max(0, total - visible()); }

      /* build dots */
      function buildDots() {
        dotsEl.innerHTML = '';
        const count = maxIndex() + 1;
        for (let i = 0; i < count; i++) {
          const d = document.createElement('button');
          d.className = 'testi-dot' + (i === current ? ' active' : '');
          d.setAttribute('aria-label', 'Testimoni ' + (i + 1));
          d.addEventListener('click', () => goTo(i));
          dotsEl.appendChild(d);
        }
      }

      function goTo(idx) {
        current = Math.max(0, Math.min(idx, maxIndex()));
        /* card width + gap */
        const cardEl = cards[0];
        const style = getComputedStyle(track);
        const gap = parseFloat(style.gap) || 24;
        const cardW = cardEl.getBoundingClientRect().width;
        track.style.transform = `translateX(-${current * (cardW + gap)}px)`;
        /* update dots */
        Array.from(dotsEl.children).forEach((d, i) => {
          d.classList.toggle('active', i === current);
        });
        btnPrev.disabled = current === 0;
        btnNext.disabled = current === maxIndex();
      }

      function next() { goTo(current >= maxIndex() ? 0 : current + 1); }
      function prev() { goTo(current <= 0 ? maxIndex() : current - 1); }

      function startAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(next, AUTO_DELAY);
      }
      function stopAuto() { clearInterval(autoTimer); }

      btnNext.addEventListener('click', () => { next(); startAuto(); });
      btnPrev.addEventListener('click', () => { prev(); startAuto(); });

      /* pause on hover */
      track.closest('.testi-carousel-wrapper').addEventListener('mouseenter', stopAuto);
      track.closest('.testi-carousel-wrapper').addEventListener('mouseleave', startAuto);

      /* touch / swipe */
      let touchX = 0;
      track.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
      track.addEventListener('touchend', e => {
        const diff = touchX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) diff > 0 ? next() : prev();
        startAuto();
      });

      /* keyboard */
      document.addEventListener('keydown', e => {
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
      });

      /* recalc on resize */
      window.addEventListener('resize', () => { buildDots(); goTo(current); });

      /* init */
      buildDots();
      goTo(0);
      startAuto();
    })();
  </script>

  <!-- =============================================
     SECTION 6: GALERI
     ============================================= -->
  <?php
  $galeri_items = [
    ['foto' => findImg('foto1'), 'label' => 'Suasana Kelas & Praktik'],
    ['foto' => findImg('foto2'), 'label' => 'Dapur Profesional'],
    ['foto' => findImg('foto3'), 'label' => 'Aktivitas Mahasiswa'],
    ['foto' => findImg('foto4'), 'label' => 'Workshop & Pelatihan'],
    ['foto' => findImg('foto5'), 'label' => 'Sesi Bersama Instruktur'],
    ['foto' => findImg('foto6'), 'label' => 'Kehidupan Kampus'],
  ];
  // Fallback ke pool foto jika findImg gagal
  foreach ($galeri_items as &$item) {
    if (!$item['foto'])
      $item['foto'] = $all_photos[0] ?? null;
  }
  unset($item);
  ?>
  <section class="section" id="galeri" style="background:#F8F9FB;" aria-label="Galeri Kehidupan Akademi">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label" style="color:var(--orange);">GALERI</div>
        <h2 class="section-title">Kehidupan di Akademi</h2>
        <p class="section-subtitle">Suasana belajar, praktik, dan kreasi mahasiswa kami sehari-hari</p>
      </div>

      <div class="galeri-grid fade-in">
        <?php foreach ($galeri_items as $item): ?>
          <div class="galeri-card">
            <?php if ($item['foto']): ?>
              <img src="<?= e($item['foto']) ?>" alt="<?= e($item['label']) ?>" loading="lazy">
            <?php else: ?>
              <div style="width:100%;height:100%;background:linear-gradient(145deg,#0F3C91,#1a4db0);"></div>
            <?php endif; ?>
            <div class="galeri-overlay"></div>
            <span class="galeri-label"><?= e($item['label']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <style>
    /* ─── Gallery Grid ──────────────────────────────────── */
    .galeri-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, 280px);
      gap: 16px;
    }

    .galeri-card {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      cursor: pointer;
      background: #ddd;
    }

    .galeri-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .galeri-card:hover img {
      transform: scale(1.06);
    }

    .galeri-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.62) 0%, rgba(0, 0, 0, 0.08) 45%, transparent 100%);
      pointer-events: none;
    }

    .galeri-label {
      position: absolute;
      bottom: 18px;
      left: 20px;
      right: 20px;
      color: #fff;
      font-size: 15px;
      font-weight: 500;
      font-family: 'Inter', sans-serif;
      letter-spacing: 0.01em;
      text-shadow: 0 1px 6px rgba(0, 0, 0, 0.5);
      pointer-events: none;
    }

    /* Tablet */
    @media (max-width: 1024px) {
      .galeri-grid {
        grid-template-rows: repeat(2, 220px);
      }
    }

    /* Mobile */
    @media (max-width: 640px) {
      .galeri-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, 200px);
        gap: 12px;
      }
    }

    @media (max-width: 420px) {
      .galeri-grid {
        grid-template-columns: 1fr;
        grid-template-rows: repeat(6, 220px);
      }
    }
  </style>

  <!-- =============================================
     SECTION: NEWSROOM
     ============================================= -->
  <section class="section bg-light" id="newsroom" aria-label="Berita Terkini ABKIG">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label" style="color:var(--orange);">NEWSROOM</div>
        <h2 class="section-title">Berita &amp; Artikel Terkini</h2>
        <p class="section-subtitle">Dapatkan informasi terbaru mengenai aktivitas Kampus, Prestasi, dan Kemitraan ABKIG</p>
      </div>

      <div class="news-grid fade-in">
        <?php foreach ($latestNews as $news): ?>
          <div class="news-card">
            <div class="news-img-box">
              <span class="news-category-badge <?= getCategoryClass($news['category']) ?>">
                <?= e($news['category']) ?>
              </span>
              <img src="<?= e($news['thumbnail']) ?>" alt="<?= e($news['title']) ?>" loading="lazy">
            </div>
            <div class="news-content">
              <div class="news-date">
                <?= formatDate($news['date']) ?>
              </div>
              <h3 class="news-title"><?= e($news['title']) ?></h3>
              <p class="news-excerpt">
                <?= e($news['excerpt']) ?>
              </p>
              <a href="news-detail.php?id=<?= $news['id'] ?>" class="news-link">
                Baca Selengkapnya <span>→</span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center" style="margin-top: 50px;">
        <a href="news.php" class="btn btn-navy">Lihat Semua Berita</a>
      </div>
    </div>
  </section>

  <!-- =============================================
     SECTION 7: PARTNERSHIP / MITRA (Marquee)
     ============================================= -->
  <section class="section bg-white" id="partners" aria-label="Mitra ABKIG">
    <div class="container">
      <div class="section-header text-center" style="margin-bottom:48px;">
        <div class="section-label" style="color:var(--orange);">PARTNERSHIP</div>
        <h2 class="section-title">Jaringan Kemitraan Global</h2>
        <p class="section-subtitle" style="font-size:0.95rem; max-width:700px;">Dipercaya oleh mitra industri terkemuka tempat mahasiswa dan alumni kami mengukir karier profesional.</p>
      </div>

      <div class="partner-carousel-wrapper">
        <!-- Prev Button -->
        <button class="partner-arrow partner-arrow--prev" id="partnerPrev" aria-label="Partner sebelumnya">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6" />
          </svg>
        </button>

        <!-- Track -->
        <div class="partner-track-outer">
          <div class="partner-track" id="partnerTrack">
            <?php
            $dbPartners = getPartners();
            if (!empty($dbPartners)):
              foreach ($dbPartners as $p):
                $initials = getPartnerInitials($p['name']);
            ?>
              <div class="partner-card">
                <?php if (!empty($p['logo']) && file_exists(dirname(__FILE__) . '/' . $p['logo'])): ?>
                   <div class="partner-logo-box" style="height: 72px; display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                     <img src="<?= e($p['logo']) ?>" alt="<?= e($p['name']) ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                   </div>
                <?php else: ?>
                  <div class="partner-initials-circle" style="background: var(--navy); color: #fff;"><?= e($initials) ?></div>
                <?php endif; ?>
                <h3 class="partner-name"><?= e($p['name']) ?></h3>
              </div>
            <?php 
              endforeach; 
            endif;
            ?>
          </div>
        </div>

        <!-- Next Button -->
        <button class="partner-arrow partner-arrow--next" id="partnerNext" aria-label="Partner berikutnya">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6" />
          </svg>
        </button>
      </div>

      <!-- Dots -->
      <div class="partner-dots" id="partnerDots" aria-label="Navigasi partner"></div>
    </div>
  </section>

  <style>
    /* ─── Partnership Carousel ──────────────────────────── */
    .partner-carousel-wrapper {
      position: relative;
      display: flex;
      align-items: center;
      gap: 16px;
      margin: 0 -10px; /* offset for card hover space */
      padding: 20px 10px;
    }

    .partner-track-outer {
      overflow: hidden;
      width: 100%;
    }

    .partner-track {
      display: flex;
      gap: 24px;
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
      will-change: transform;
    }

    .partner-track .partner-card {
      flex: 0 0 calc((100% - (24px * 3)) / 4);
      min-width: 0;
    }

    .partner-card {
      background: #FFFFFF;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 20px;
      padding: 40px 24px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      cursor: pointer;
    }

    .partner-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 24px 48px rgba(15, 60, 145, 0.12);
      border-color: rgba(15, 60, 145, 0.08);
      background: #fff;
    }

    .partner-initials-circle {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 24px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      transition: transform 0.4s ease;
    }

    .partner-card:hover .partner-initials-circle {
      transform: scale(1.1) rotate(5deg);
    }

    .partner-name {
      font-family: var(--font-heading);
      color: #1a3a6c;
      font-size: 1.15rem;
      font-weight: 600;
      margin: 0;
      line-height: 1.3;
    }

    /* Arrows */
    .partner-arrow {
      flex-shrink: 0;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      border: 2px solid var(--gray-200);
      background: #fff;
      color: var(--navy);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      z-index: 10;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .partner-arrow:hover {
      background: var(--navy);
      border-color: var(--navy);
      color: #fff;
      transform: scale(1.1);
    }

    .partner-arrow:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    /* Dots */
    .partner-dots {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 32px;
    }

    .partner-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--gray-300);
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 0;
    }

    .partner-dot.active {
      background: var(--orange);
      width: 24px;
      border-radius: 4px;
    }

    /* Responsive Flex Basis */
    @media (max-width: 1024px) {
      .partner-track .partner-card {
        flex: 0 0 calc((100% - (24px * 2)) / 3);
      }
    }

    @media (max-width: 768px) {
      .partner-track .partner-card {
        flex: 0 0 calc((100% - 24px) / 2);
      }
      .partner-card {
        padding: 30px 16px;
      }
      .partner-initials-circle {
        width: 60px;
        height: 60px;
        font-size: 1.25rem;
      }
      .partner-name {
        font-size: 1rem;
      }
      .partner-arrow {
        display: none; /* Hide arrows on mobile, use touch swipe */
      }
    }
  </style>
  <script>
    (function () {
      const track = document.getElementById('partnerTrack');
      const dotsEl = document.getElementById('partnerDots');
      const btnPrev = document.getElementById('partnerPrev');
      const btnNext = document.getElementById('partnerNext');
      if (!track) return;

      const cards = Array.from(track.children);
      const total = cards.length;
      let current = 0;
      let autoTimer = null;
      const AUTO_DELAY = 4000;

      function visible() {
        if (window.innerWidth <= 768) return 2;
        if (window.innerWidth <= 1024) return 3;
        return 4;
      }

      function maxIndex() { return Math.max(0, total - visible()); }

      function buildDots() {
        if (!dotsEl) return;
        dotsEl.innerHTML = '';
        const count = maxIndex() + 1;
        if (count <= 1) return;
        for (let i = 0; i < count; i++) {
          const d = document.createElement('button');
          d.className = 'partner-dot' + (i === current ? ' active' : '');
          d.setAttribute('aria-label', 'Partner ' + (i + 1));
          d.addEventListener('click', () => goTo(i));
          dotsEl.appendChild(d);
        }
      }

      function goTo(idx) {
        current = Math.max(0, Math.min(idx, maxIndex()));
        const cardEl = cards[0];
        const style = getComputedStyle(track);
        const gap = parseFloat(style.gap) || 24;
        const cardW = cardEl.getBoundingClientRect().width;
        track.style.transform = `translateX(-${current * (cardW + gap)}px)`;
        
        if (dotsEl) {
          Array.from(dotsEl.children).forEach((d, i) => {
            d.classList.toggle('active', i === current);
          });
        }
        btnPrev.disabled = current === 0;
        btnNext.disabled = current === maxIndex();
      }

      function next() {
        if (current >= maxIndex()) goTo(0);
        else goTo(current + 1);
      }
      function prev() {
        if (current <= 0) goTo(maxIndex());
        else goTo(current - 1);
      }

      function startAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(next, AUTO_DELAY);
      }
      function stopAuto() { clearInterval(autoTimer); }

      btnNext.addEventListener('click', () => { next(); startAuto(); });
      btnPrev.addEventListener('click', () => { prev(); startAuto(); });

      track.closest('.partner-carousel-wrapper').addEventListener('mouseenter', stopAuto);
      track.closest('.partner-carousel-wrapper').addEventListener('mouseleave', startAuto);

      let touchX = 0;
      track.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
      track.addEventListener('touchend', e => {
        const diff = touchX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) diff > 0 ? next() : prev();
        startAuto();
      });

      window.addEventListener('resize', () => { buildDots(); goTo(current); });

      /* init */
      buildDots();
      goTo(0);
      startAuto();
    })();
  </script>

  <!-- =============================================
     SECTION 8: CONTACT US
     ============================================= -->
  <section class="section cta-section" id="contact" style="background:#F8F9FB;" aria-label="Contact Us">
    <div class="container">
      <div class="cta-content" style="max-width:800px; margin:0 auto; text-align:center;">
        <div class="section-label" style="color:var(--gold); justify-content:center;">✨ BERGABUNGLAH BERSAMA KAMI</div>
        <h2 style="color:var(--navy); margin-bottom:16px; font-size:2.8rem;">Siap Memulai Perjalanan<br>Kuliner Anda?
        </h2>
        <p style="color:var(--gray-600); font-size:1.1rem; margin-bottom:32px; text-align: justify;">Hubungi tim konsultan pendidikan kami
          untuk konsultasi jalur akademik atau kunjungan kampus di Pantai Indah Kapuk.</p>
        <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
          <a href="contact.php#daftar" class="btn btn-primary btn-lg">🚀 Daftar Sekarang</a>
          <a href="contact.php" class="btn btn-outline btn-lg">Hubungi Kami</a>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  <script src="assets/js/main.js"></script>
</body>

</html>