<?php
/**
 * ABKIG Admin - Category Management
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$error = '';
$success = '';

// Handle Add Category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $name = trim($_POST['name'] ?? '');
    if (!$name) {
        $error = 'Nama kategori wajib diisi.';
    } else {
        if (addCategory($name)) {
            $success = 'Kategori berhasil ditambahkan.';
        } else {
            $error = 'Gagal menambahkan kategori. Mungkin nama sudah ada.';
        }
    }
}

// Handle Delete Category
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id > 0) {
        if (deleteCategory($id)) {
            $success = 'Kategori berhasil dihapus. Berita terkait dipindahkan ke "Tanpa Kategori".';
        } else {
            $error = 'Gagal menghapus kategori.';
        }
    }
}

$categories = getCategories();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Kategori — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'categories'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Kelola Kategori</h1>
      <div class="admin-topbar-actions">
        <a href="index.php" class="btn btn-outline btn-sm">← Kembali ke Dashboard</a>
      </div>
    </div>

    <div class="admin-content">
      
      <div style="display:grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: start;">
        
        <!-- Add Category Form -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Tambah Kategori Baru</h3>
          </div>
          <div style="padding:20px;">
            <?php if ($error): ?><div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div><?php endif; ?>
            <?php if ($success): ?><div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div><?php endif; ?>
            
            <form method="POST">
              <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" id="name" name="name" placeholder="Contoh: Tips Karir" required>
              </div>
              <button type="submit" name="add_category" class="btn btn-primary" style="width:100%; justify-content:center;">
                ➕ Tambah Kategori
              </button>
            </form>
          </div>
        </div>

        <!-- Categories List -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Daftar Kategori</h3>
          </div>
          <div style="padding:0;">
            <?php if (!empty($categories)): ?>
            <table class="admin-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $cat): ?>
                <tr>
                  <td style="width:50px;"><?= (int)$cat['id'] ?></td>
                  <td style="font-weight:600;"><?= htmlspecialchars($cat['name']) ?></td>
                  <td style="width:100px;">
                    <?php if ($cat['name'] !== 'Tanpa Kategori'): ?>
                      <a href="?delete=<?= (int)$cat['id'] ?>" class="action-btn delete" 
                         onclick="return confirm('Hapus kategori ini? Berita terkait akan diubah menjadi Tanpa Kategori.')"
                         style="background:rgba(220,53,69,0.1); color:#dc3545;">🗑 Hapus</a>
                    <?php else: ?>
                      <span style="font-size:0.75rem; color:var(--gray-400);">Default</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php else: ?>
              <div style="padding:40px; text-align:center; color:var(--gray-400);">Belum ada kategori.</div>
            <?php endif; ?>
          </div>
        </div>

      </div>

    </div>
  </main>
</div>
</body>
</html>
