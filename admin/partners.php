<?php
/**
 * ABKIG Admin - Partners Management
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$error = '';
$success = '';

// Handle Add Partner
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_partner'])) {
    $name = trim($_POST['name'] ?? '');
    $logo = '';

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logo = handleImageUpload($_FILES['logo'], 'partner', 'partnership');
    }

    if (!$name || !$logo) {
        $error = 'Nama dan Logo wajib diisi.';
    } else {
        if (addPartner($name, $logo)) {
            $success = 'Partner berhasil ditambahkan.';
        } else {
            $error = 'Gagal menambahkan partner.';
        }
    }
}

// Handle Delete Partner
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id > 0) {
        if (deletePartner($id)) {
            $success = 'Partner berhasil dihapus.';
        } else {
            $error = 'Gagal menghapus partner.';
        }
    }
}

$partners = getPartners();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Partner — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'partners'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Kelola Partnership</h1>
    </div>

    <div class="admin-content">
      
      <div style="display:grid; grid-template-columns: 1fr 2fr; gap: 30px; align-items: start;">
        
        <!-- Add Partner Form -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Tambah Partner Baru</h3>
          </div>
          <div style="padding:20px;">
            <?php if ($error): ?><div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div><?php endif; ?>
            <?php if ($success): ?><div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div><?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Nama Instansi/Brand</label>
                <input type="text" id="name" name="name" placeholder="Contoh: Hilton Hotel" required>
              </div>
              <div class="form-group">
                <label for="logo">Logo Partner</label>
                <input type="file" id="logo" name="logo" accept="image/*" required>
                <p style="font-size:0.75rem; color:var(--gray-500); margin-top:5px;">Gunakan latar belakang transparan (PNG/WebP) untuk hasil maksimal.</p>
              </div>
              <button type="submit" name="add_partner" class="btn btn-primary" style="width:100%; justify-content:center;">
                🤝 Tambah Partner
              </button>
            </form>
          </div>
        </div>

        <!-- Partners list -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h3>Daftar Partner</h3>
          </div>
          <div style="padding:0;">
            <?php if (!empty($partners)): ?>
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Logo</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($partners as $p): ?>
                <tr>
                  <td style="width:100px;">
                    <div style="width:60px; height:40px; background:#f0f2f5; display:flex; align-items:center; justify-content:center; border-radius:4px; overflow:hidden;">
                      <img src="../<?= e($p['logo']) ?>" alt="" style="max-width:90%; max-height:90%; object-fit:contain;">
                    </div>
                  </td>
                  <td style="font-weight:600;"><?= htmlspecialchars($p['name']) ?></td>
                  <td style="width:120px;">
                    <div class="action-buttons">
                      <a href="edit_partner.php?id=<?= (int)$p['id'] ?>" class="action-btn edit" title="Edit">✏️</a>
                      <a href="?delete=<?= (int)$p['id'] ?>" class="action-btn delete" 
                         onclick="return confirm('Hapus partner ini?')"
                         style="background:rgba(220,53,69,0.1); color:#dc3545;">🗑</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php else: ?>
              <div style="padding:40px; text-align:center; color:var(--gray-400);">Belum ada data partner.</div>
            <?php endif; ?>
          </div>
        </div>

      </div>

    </div>
  </main>
</div>
</body>
</html>
