<?php
/**
 * ABKIG Admin - Add News
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_news'])) {
    $title    = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $date     = trim($_POST['date'] ?? '');
    $excerpt  = trim($_POST['excerpt'] ?? '');
    $content  = $_POST['content'] ?? '';

    if (!$title || !$category || !$date || !$excerpt || !$content) {
        $error = 'Semua kolom wajib diisi.';
    } else {
        // Handle image upload
        $thumbnail = '';
        if (!empty($_FILES['thumbnail']['name'])) {
            $thumbnail = handleImageUpload($_FILES['thumbnail'], 'news');
            if (!$thumbnail) $error = 'Gagal mengunggah gambar. Pastikan format JPG/PNG/WEBP dan ukuran < 5MB.';
        }

        if (!$error) {
            $data = [
                'title'     => $title,
                'category'  => $category,
                'date'      => $date,
                'thumbnail' => $thumbnail,
                'excerpt'   => $excerpt,
                'content'   => $content,
            ];
            addNews($data);
            header('Location: index.php?saved=1');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Berita — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'news'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Tambah Berita</h1>
      <div class="admin-topbar-actions">
        <a href="index.php" class="btn btn-outline btn-sm">← Kembali</a>
      </div>
    </div>

    <div class="admin-content">
      <div class="admin-form-card">
        <?php if ($error): ?>
          <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" id="newsForm">
          <div class="form-row">
            <div class="form-group" style="grid-column:1/-1;">
              <label for="title">Judul Berita <span style="color:#dc3545">*</span></label>
              <input type="text" id="title" name="title" placeholder="Masukkan judul berita..." value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="category">Kategori <span style="color:#dc3545">*</span></label>
              <select id="category" name="category" required>
                <option value="">Pilih kategori...</option>
                <?php
                $dbCats = getCategories();
                $currentCat = $_POST['category'] ?? '';
                foreach ($dbCats as $c):
                  $sel = ($currentCat === $c['name']) ? 'selected' : '';
                ?>
                <option value="<?= htmlspecialchars($c['name']) ?>" <?= $sel ?>><?= htmlspecialchars($c['name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Tanggal <span style="color:#dc3545">*</span></label>
              <input type="date" id="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? date('Y-m-d')) ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="thumbnail">Thumbnail / Gambar</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/webp">
            <small style="color:var(--gray-500);font-size:0.8rem;">Format: JPG, PNG, WEBP. Maks: 5MB. (Opsional)</small>
            <div id="imgPreview" style="display:none;margin-top:10px;">
              <img id="previewImg" src="" alt="Preview" style="max-height:160px;border-radius:8px;border:1px solid var(--gray-200);">
            </div>
          </div>

          <div class="form-group">
            <label for="excerpt">Ringkasan / Excerpt <span style="color:#dc3545">*</span></label>
            <textarea id="excerpt" name="excerpt" rows="3" placeholder="Tulis ringkasan singkat berita (1-2 kalimat)..." required><?= htmlspecialchars($_POST['excerpt'] ?? '') ?></textarea>
          </div>

          <div class="form-group">
            <label for="content">Konten Berita (HTML diizinkan) <span style="color:#dc3545">*</span></label>
            <textarea id="content" name="content" rows="14" placeholder="Tulis konten lengkap berita di sini. HTML dasar seperti <p>, <strong>, <em>, <blockquote>, <h2>, <ul>, <li> diizinkan..." style="font-family:monospace;font-size:0.875rem;" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
            <small style="color:var(--gray-500);font-size:0.8rem;">HTML diizinkan: &lt;p&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;blockquote&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;a&gt;, &lt;img&gt;</small>
          </div>

          <div style="display:flex;gap:12px;justify-content:flex-end;">
            <a href="index.php" class="btn btn-outline">Batal</a>
            <button type="submit" name="save_news" class="btn btn-primary">💾 Simpan Berita</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<script>
// Image preview
document.getElementById('thumbnail').addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('previewImg').src = e.target.result;
      document.getElementById('imgPreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
  }
});
</script>
</body>
</html>
