<?php
/**
 * ABKIG Admin - Edit News
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$news = $id > 0 ? getNewsById($id) : null;

if (!$news) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_news'])) {
    $title    = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $date     = trim($_POST['date'] ?? '');
    $excerpt  = trim($_POST['excerpt'] ?? '');
    $content  = $_POST['content'] ?? '';

    if (!$title || !$category || !$date || !$excerpt || !$content) {
        $error = 'Semua kolom wajib diisi.';
    } else {
        $thumbnail = $news['thumbnail'];
        if (!empty($_FILES['thumbnail']['name'])) {
            $newThumb = handleImageUpload($_FILES['thumbnail'], 'news');
            if ($newThumb) $thumbnail = $newThumb;
            else $error = 'Gagal mengunggah gambar baru.';
        }

        if (!$error) {
            $data = [
                'title'     => $title,
                'category'  => $category,
                'date'      => $date,
                'excerpt'   => $excerpt,
                'content'   => $content,
                'thumbnail' => $thumbnail,
            ];
            updateNews($id, $data);
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
  <title>Edit Berita — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'news'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Edit Berita #<?= $id ?></h1>
      <div class="admin-topbar-actions">
        <a href="index.php" class="btn btn-outline btn-sm">← Kembali</a>
      </div>
    </div>

    <div class="admin-content">
      <div class="admin-form-card">
        <?php if ($error): ?>
          <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Judul Berita <span style="color:#dc3545">*</span></label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($_POST['title'] ?? $news['title']) ?>" required>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="category">Kategori <span style="color:#dc3545">*</span></label>
              <select id="category" name="category" required>
                <?php
                $dbCats = getCategories();
                $currentCat = $_POST['category'] ?? $news['category'];
                foreach ($dbCats as $c): ?>
                <option value="<?= htmlspecialchars($c['name']) ?>" <?= $currentCat === $c['name'] ? 'selected' : '' ?>><?= htmlspecialchars($c['name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Tanggal <span style="color:#dc3545">*</span></label>
              <input type="date" id="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? $news['date']) ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="thumbnail">Thumbnail Baru (opsional)</label>
            <?php if (!empty($news['thumbnail'])): ?>
              <div style="margin-bottom:8px;">
                <p style="font-size:0.8rem;color:var(--gray-500);margin-bottom:6px;">Thumbnail saat ini:</p>
                <img src="../<?= htmlspecialchars($news['thumbnail']) ?>" alt="" style="max-height:100px;border-radius:8px;border:1px solid var(--gray-200);" onerror="this.style.display='none'">
              </div>
            <?php endif; ?>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/png,image/webp">
            <small style="color:var(--gray-500);font-size:0.8rem;">Kosongkan jika tidak ingin mengubah gambar.</small>
          </div>

          <div class="form-group">
            <label for="excerpt">Ringkasan <span style="color:#dc3545">*</span></label>
            <textarea id="excerpt" name="excerpt" rows="3" required><?= htmlspecialchars($_POST['excerpt'] ?? $news['excerpt']) ?></textarea>
          </div>

          <div class="form-group">
            <label for="content">Konten Berita <span style="color:#dc3545">*</span></label>
            <textarea id="content" name="content" rows="14" style="font-family:monospace;font-size:0.875rem;" required><?= htmlspecialchars($_POST['content'] ?? $news['content']) ?></textarea>
          </div>

          <div style="display:flex;gap:12px;justify-content:flex-end;">
            <a href="index.php" class="btn btn-outline">Batal</a>
            <button type="submit" name="update_news" class="btn btn-primary">💾 Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
</body>
</html>
