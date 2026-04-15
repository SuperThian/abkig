<?php
/**
 * ABKIG Admin - Edit Partner
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';
requireAdminLogin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$partner = $id > 0 ? getPartnerById($id) : null;

if (!$partner) {
    header('Location: partners.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_partner'])) {
    $name = trim($_POST['name'] ?? '');
    $logo = '';

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logo = handleImageUpload($_FILES['logo'], 'partner', 'partnership');
    }

    if (!$name) {
        $error = 'Nama partner wajib diisi.';
    } else {
        if (updatePartner($id, $name, $logo)) {
            $success = 'Partner berhasil diperbarui.';
            $partner = getPartnerById($id); // Refresh data
        } else {
            $error = 'Gagal memperbarui partner.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Partner — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">
  <!-- Sidebar -->
  <?php $activePage = 'partners'; include 'includes/sidebar.php'; ?>

  <main class="admin-main">
    <div class="admin-topbar">
      <h1>Edit Partner #<?= $id ?></h1>
    </div>

    <div class="admin-content">
      <div class="admin-card" style="max-width: 600px; margin: 0 auto;">
        <div class="admin-card-header">
          <h3>Ubah Informasi Partner</h3>
          <a href="partners.php" class="btn btn-outline btn-sm">← Kembali</a>
        </div>
        <div style="padding:20px;">
          <?php if ($error): ?><div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div><?php endif; ?>
          <?php if ($success): ?><div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div><?php endif; ?>
          
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">Nama Instansi/Brand</label>
              <input type="text" id="name" name="name" value="<?= htmlspecialchars($partner['name']) ?>" required>
            </div>
            
            <div class="form-group">
              <label>Logo Saat Ini</label>
              <div style="width:120px; height:80px; background:#f0f2f5; display:flex; align-items:center; justify-content:center; border-radius:8px; overflow:hidden; border:1px solid #ddd; margin-bottom:10px;">
                <img src="../<?= e($partner['logo']) ?>" alt="" style="max-width:90%; max-height:90%; object-fit:contain;">
              </div>
              <label for="logo">Ganti Logo (Kosongkan jika tidak ingin mengubah)</label>
              <input type="file" id="logo" name="logo" accept="image/*">
            </div>

            <button type="submit" name="update_partner" class="btn btn-primary" style="width:100%; justify-content:center; margin-top:20px;">
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
