<?php
/**
 * ABKIG - Contact Page
 */
$currentPage = 'contact';
$baseUrl = '';
require_once 'includes/functions.php';

$success = false;
$formData = ['nama' => '', 'email' => '', 'hp' => '', 'subjek' => '', 'pesan' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contactSubmit'])) {
  $nama = trim($_POST['nama'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $hp = trim($_POST['hp'] ?? '');
  $subjek = trim($_POST['subjek'] ?? '');
  $pesan = trim($_POST['pesan'] ?? '');

  // Basic server-side validation
  if ($nama && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($hp) >= 8 && strlen($pesan) >= 10) {
    // In production: send email via mail() or SMTP, save to DB, etc.
    $success = true;
    $formData = ['nama' => '', 'email' => '', 'hp' => '', 'subjek' => '', 'pesan' => ''];
  } else {
    $formData = compact('nama', 'email', 'hp', 'subjek', 'pesan');
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Hubungi ABKIG — Kontak, lokasi, dan formulir pendaftaran Akademi Bisnis Kuliner Indonesia Global Jakarta.">
  <title>Kontak — ABKIG</title>
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
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a>
          <span class="separator">›</span>
          <span class="current">Kontak</span>
        </nav>
        <h1>Hubungi Kami</h1>
        <p style="color:rgba(255,255,255,0.75);max-width:560px;margin-top:12px;">
          Kami siap membantu Anda mendapatkan informasi lengkap tentang program dan pendaftaran ABKIG.
        </p>
      </div>
    </div>
  </section>

  <!-- =============================================
     CONTACT SECTION
     ============================================= -->
  <section class="section bg-white" id="daftar">
    <div class="container">
      <div class="contact-grid">

        <!-- Info Kontak -->
        <div class="slide-in-left">
          <div class="section-label">Informasi Kontak</div>
          <h2 class="section-title">Ayo Berbicara<br>dengan Kami</h2>
          <p style="margin-bottom:36px;">
            Tim admisi kami siap menjawab pertanyaan Anda tentang program, biaya, jadwal, dan prosedur pendaftaran.
            Jangan ragu untuk menghubungi kami.
          </p>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0F3C91" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
            </div>
            <div class="contact-info-text">
              <h4>Alamat Kampus</h4>
              <p>Jl. Pantai Indah Utara 2, Pantai Indah Kapuk<br>Jakarta Utara 14460, DKI Jakarta</p>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0F3C91" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" />
              </svg>
            </div>
            <div class="contact-info-text">
              <h4>Email</h4>
              <a href="mailto:akademi.bisniskulinerindoglob@gmail.com">akademi.bisniskulinerindoglob@gmail.com</a>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-info-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0F3C91" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
              </svg>
            </div>
            <div class="contact-info-text">
              <h4>Jam Operasional</h4>
              <p>Senin – Jumat: 08.00 – 17.00 WIB<br>Sabtu: 08.00 – 14.00 WIB</p>
            </div>
          </div>

          <!-- Map -->
          <div class="map-placeholder" style="height:250px;margin-top:24px;">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1!2d106.74!3d-6.12!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sPantai+Indah+Kapuk%2C+Jakarta+Utara!5e0!3m2!1sen!2sid!4v1!5m2!1sen!2sid"
              style="width:100%;height:100%;border:none;border-radius:var(--border-radius);" allowfullscreen=""
              loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Lokasi ABKIG di Google Maps">
            </iframe>
          </div>
        </div>

        <!-- Form Kontak -->
        <div class="slide-in-right">
          <div class="contact-form">
            <div style="margin-bottom:28px;">
              <div class="section-label" style="justify-content:flex-start;">Formulir Pendaftaran</div>
              <h3 style="margin-bottom:8px;">Kirim Pesan atau Daftar</h3>
              <p style="font-size:0.875rem;">Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda dalam
                1×24 jam kerja.</p>
            </div>

            <!-- Success Message -->
            <?php if ($success): ?>
              <div class="alert alert-success" id="formSuccess" style="display:flex;">
                ✅ Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.
              </div>
            <?php else: ?>
              <div class="form-success" id="formSuccess">
                ✅ Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.
              </div>
            <?php endif; ?>

            <form id="contactForm" method="POST" action="contact.php#daftar" novalidate>
              <div class="form-row">
                <div class="form-group">
                  <label for="nama">Nama Lengkap <span style="color:#dc3545">*</span></label>
                  <input type="text" id="nama" name="nama" placeholder="John Doe" value="<?= e($formData['nama']) ?>"
                    autocomplete="name" required>
                  <div class="form-error" id="namaError"></div>
                </div>
                <div class="form-group">
                  <label for="email">Email <span style="color:#dc3545">*</span></label>
                  <input type="email" id="email" name="email" placeholder="john@email.com"
                    value="<?= e($formData['email']) ?>" autocomplete="email" required>
                  <div class="form-error" id="emailError"></div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="hp">Nomor HP / WhatsApp <span style="color:#dc3545">*</span></label>
                  <input type="tel" id="hp" name="hp" placeholder="08xxxxxxxxxx" value="<?= e($formData['hp']) ?>"
                    autocomplete="tel" required>
                  <div class="form-error" id="hpError"></div>
                </div>
                <div class="form-group">
                  <label for="subjek">Subjek / Keperluan</label>
                  <select id="subjek" name="subjek">
                    <option value="" <?= $formData['subjek'] === '' ? 'selected' : '' ?>>Pilih keperluan...</option>
                    <option value="Informasi D3" <?= $formData['subjek'] === 'Informasi D3' ? 'selected' : '' ?>>Informasi
                      Program D3</option>
                    <option value="Informasi D1" <?= $formData['subjek'] === 'Informasi D1' ? 'selected' : '' ?>>Informasi
                      Program D1</option>
                    <option value="Informasi Short Course" <?= $formData['subjek'] === 'Informasi Short Course' ? 'selected' : '' ?>>Informasi Short Course</option>
                    <option value="Pendaftaran" <?= $formData['subjek'] === 'Pendaftaran' ? 'selected' : '' ?>>Pendaftaran
                      Mahasiswa</option>
                    <option value="Biaya" <?= $formData['subjek'] === 'Biaya' ? 'selected' : '' ?>>Informasi Biaya</option>
                    <option value="Lainnya" <?= $formData['subjek'] === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="pesan">Pesan <span style="color:#dc3545">*</span></label>
                <textarea id="pesan" name="pesan"
                  placeholder="Tulis pesan, pertanyaan, atau informasi tambahan Anda di sini..." rows="5"
                  required><?= e($formData['pesan']) ?></textarea>
                <div class="form-error" id="pesanError"></div>
              </div>

              <input type="hidden" name="contactSubmit" value="1">
              <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;" id="submitBtn">
                📤 Kirim Pesan
              </button>

              <p style="font-size:0.75rem;color:var(--gray-500);margin-top:12px;text-align:center;">
                Dengan mengirim pesan ini, Anda setuju dengan <a href="#" style="color:var(--navy);">Kebijakan
                  Privasi</a> kami.
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =============================================
     FAQ / Quick Info
     ============================================= -->
  <section class="section bg-light">
    <div class="container">
      <div class="section-header text-center">
        <div class="section-label">FAQ</div>
        <h2 class="section-title">Pertanyaan Umum</h2>
      </div>
      <div style="max-width:760px;margin:0 auto;display:flex;flex-direction:column;gap:12px;" class="fade-in">
        <?php
        $faqs = [
          ['Apa syarat untuk mendaftar ke ABKIG?', 'Calon mahasiswa minimal lulusan SMA/SMK/sederajat. Tidak diperlukan latar belakang kuliner khusus. Kami menerima semua yang memiliki passion di bidang kuliner dan bisnis.'],
          ['Apakah tersedia program beasiswa?', 'Ya, ABKIG menyediakan beasiswa prestasi bagi pendaftar terbaik. Hubungi tim admisi kami untuk informasi detail tentang skema beasiswa yang tersedia.'],
          ['Berapa lama waktu studi untuk program D3?', 'Program D3 Pastry & Culinary Business berlangsung selama 6 semester atau sekitar 3 tahun, termasuk 1 semester magang industri selama ±6 bulan.'],
          ['Apakah ada jaminan kerja setelah lulus?', 'ABKIG berkomitmen pada target minimal 80% lulusan terserap industri dalam 6 bulan setelah lulus. Kami memiliki program career placement dan jaringan industri yang luas untuk mendukung karir Anda.'],
          ['Apakah program bisa dilakukan part-time?', 'Untuk program Short Course (3 atau 6 bulan), tersedia jadwal yang lebih fleksibel. Hubungi tim admisi kami untuk mendiskusikan opsi yang sesuai dengan jadwal Anda.'],
        ];
        foreach ($faqs as $i => $faq): ?>
          <div
            style="background:var(--white);border-radius:var(--border-radius);border:1px solid var(--gray-200);overflow:hidden;">
            <button class="accordion-toggle"
              style="width:100%;text-align:left;padding:20px 24px;font-family:var(--font-body);font-size:0.95rem;font-weight:600;color:var(--navy);background:none;border:none;cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:16px;"
              aria-expanded="false" id="faq-toggle-<?= $i ?>">
              <?= e($faq[0]) ?>
              <span style="font-size:1.2rem;flex-shrink:0;transition:transform 0.3s;">+</span>
            </button>
            <div class="accordion-body" style="max-height:0;overflow:hidden;transition:max-height 0.35s ease;">
              <div style="padding:0 24px 20px;">
                <p style="font-size:0.9rem;color:var(--gray-600);line-height:1.7;"><?= e($faq[1]) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  <script src="assets/js/main.js"></script>
  <script>
    // Accordion enhancements
    document.querySelectorAll('.accordion-toggle').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const arrow = this.querySelector('span:last-child');
        const isOpen = this.closest('div').querySelector('.accordion-body').style.maxHeight !== '0px';
        if (isOpen) {
          arrow.style.transform = 'rotate(0deg)';
        } else {
          arrow.style.transform = 'rotate(45deg)';
        }
      });
    });
  </script>
</body>

</html>