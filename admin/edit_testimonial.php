<?php
/**
 * ABKIG Admin - Edit Testimonial
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$testi = $id > 0 ? getTestimonialById($id) : null;

if (!$testi) {
    header('Location: testimonials.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_testimonial'])) {
    $name = trim($_POST['name'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = handleImageUpload($_FILES['image'], 'testimonial', 'testimonial');
    }

    if (!$name || !$role || !$content) {
        $error = 'Nama, Jabatan, dan Isi wajib diisi.';
    } else {
        if (updateTestimonial($id, $name, $role, $content, $image)) {
            $success = 'Testimoni berhasil diperbarui.';
            $testi = getTestimonialById($id); // Refresh
        } else {
            $error = 'Gagal memperbarui testimoni.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Testimoni — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'testimonials'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Edit Testimoni #<?= $id ?></h1>
    </div>

    <div class="admin-content">
      <div class="admin-card" style="max-width: 800px; margin: 0 auto;">
        <div class="admin-card-header">
          <h3>Ubah Kutipan Alumni/Mitra</h3>
          <a href="testimonials.php" class="btn btn-outline btn-sm">← Kembali</a>
        </div>
        <div style="padding:20px;">
          <?php if ($error): ?><div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div><?php endif; ?>
          <?php if ($success): ?><div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div><?php endif; ?>
          
          <form method="POST" enctype="multipart/form-data">
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($testi['name']) ?>" required>
              </div>
              <div class="form-group">
                <label for="role">Jabatan / Batch</label>
                <input type="text" id="role" name="role" value="<?= htmlspecialchars($testi['role']) ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="content">Isi Testimoni</label>
              <textarea id="content" name="content" required style="height:150px; padding:12px;"><?= htmlspecialchars($testi['content']) ?></textarea>
            </div>
            
            <div class="form-group">
              <label>Foto Saat Ini</label>
              <div style="width:80px; height:80px; background:#eee; border-radius:50%; overflow:hidden; border:2px solid #ddd; margin-bottom:10px;">
                <?php if ($testi['image']): ?>
                  <img src="../<?= e($testi['image']) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                <?php else: ?>
                  <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:var(--navy); color:#fff;"><?= substr($testi['name'], 0, 1) ?></div>
                <?php endif; ?>
              </div>
              <label for="image">Ganti Foto (Kosongkan jika tidak ingin mengubah)</label>
              <input type="file" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" name="update_testimonial" class="btn btn-primary" style="width:100%; justify-content:center; margin-top:20px;">
              💾 Simpan Perubahan
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
