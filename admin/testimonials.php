<?php
/**
 * ABKIG Admin - Testimonials Management
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$error = '';
$success = '';

// Handle Add Testimonial
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_testimonial'])) {
    $name = trim($_POST['name'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = handleImageUpload($_FILES['image'], 'testimonial', 'testimonial');
    }

    if (!$name || !$role || !$content) {
        $error = 'Nama, Jabatan, dan Testimoni wajib diisi.';
    } else {
        if (addTestimonial($name, $role, $content, $image)) {
            $success = 'Testimoni berhasil ditambahkan.';
        } else {
            $error = 'Gagal menambahkan testimoni.';
        }
    }
}

// Handle Delete Testimonial
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id > 0) {
        if (deleteTestimonial($id)) {
            $success = 'Testimoni berhasil dihapus.';
        } else {
            $error = 'Gagal menghapus testimoni.';
        }
    }
}

$testimonials = getTestimonials();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Testimoni — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'testimonials'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Kelola Testimoni</h1>
    </div>

    <div class="admin-content">
      
      <div style="display:grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: start;">
        
        <!-- Add Testimonial Form -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Tambah Testimoni Baru</h3>
          </div>
          <div style="padding:20px;">
            <?php if ($error): ?><div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div><?php endif; ?>
            <?php if ($success): ?><div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div><?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Contoh: Andi Wijaya" required>
              </div>
              <div class="form-group">
                <label for="role">Jabatan / Batch</label>
                <input type="text" id="role" name="role" placeholder="Contoh: Alumni Batch #3" required>
              </div>
              <div class="form-group">
                <label for="content">Isi Testimoni</label>
                <textarea id="content" name="content" placeholder="Tulis testimoni di sini..." required style="height:100px; padding:12px;"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Foto (Opsional)</label>
                <input type="file" id="image" name="image" accept="image/*">
                <p style="font-size:0.75rem; color:var(--gray-500); margin-top:5px;">Foto berbentuk kotak (1:1) direkomendasikan.</p>
              </div>
              <button type="submit" name="add_testimonial" class="btn btn-primary" style="width:100%; justify-content:center;">
                ⭐ Simpan Testimoni
              </button>
            </form>
          </div>
        </div>

        <!-- list -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Daftar Testimoni</h3>
          </div>
          <div style="padding:0;">
            <?php if (!empty($testimonials)): ?>
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Profil</th>
                  <th>Testimoni</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($testimonials as $t): ?>
                <tr>
                  <td style="width:150px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                      <div style="width:40px; height:40px; background:#eee; border-radius:50%; overflow:hidden; flex-shrink:0;">
                        <?php if ($t['image']): ?>
                          <img src="../<?= e($t['image']) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                          <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; font-size:0.8rem; background:var(--navy); color:#fff;"><?= substr($t['name'], 0, 1) ?></div>
                        <?php endif; ?>
                      </div>
                      <div>
                        <div style="font-weight:600; font-size:0.85rem; line-height:1.2;"><?= htmlspecialchars($t['name']) ?></div>
                        <div style="font-size:0.75rem; color:var(--gray-500);"><?= htmlspecialchars($t['role']) ?></div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div style="font-size:0.85rem; color:var(--gray-600); line-height:1.4; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                      "<?= htmlspecialchars($t['content']) ?>"
                    </div>
                  </td>
                  <td style="width:120px;">
                    <div class="action-buttons">
                      <a href="edit_testimonial.php?id=<?= (int)$t['id'] ?>" class="action-btn edit" title="Edit">✏️</a>
                      <a href="?delete=<?= (int)$t['id'] ?>" class="action-btn delete" 
                         onclick="return confirm('Hapus testimoni ini?')"
                         style="background:rgba(220,53,69,0.1); color:#dc3545;">🗑</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php else: ?>
              <div style="padding:40px; text-align:center; color:var(--gray-400);">Belum ada data testimoni.</div>
            <?php endif; ?>
          </div>
        </div>

      </div>

    </div>
  </main>
</div>
</body>
</html>
