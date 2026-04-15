<?php
/**
 * ABKIG - Admin Panel (Login + Dashboard)
 */
session_start();
require_once dirname(__DIR__) . '/includes/functions.php';

$baseUrl = '../';
$error = '';

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    // Hardcoded admin credentials (change in production!)
    if ($user === 'admin' && $pass === 'abkig2026') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = 'Administrator';
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}

// If not logged in, show login page
if (empty($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login — Admin ABKIG</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
    <div class="login-page">
      <div class="login-card">
        <div class="login-logo">
          <img src="../asset/image/ABKIG Logo.png" alt="ABKIG Logo">
          <h2>Admin Panel</h2>
          <p>Akademi Bisnis Kuliner Indonesia Global</p>
        </div>

        <?php if ($error): ?>
        <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="admin" required autocomplete="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
          </div>
          <input type="hidden" name="login" value="1">
          <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;margin-top:8px;">
            🔐 Masuk ke Admin Panel
          </button>
        </form>

        <div style="text-align:center;margin-top:20px;">
          <a href="../index.php" style="font-size:0.8rem;color:var(--gray-500);">← Kembali ke Website</a>
        </div>
      </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}

// ---- LOGGED IN: Show Dashboard ----
$allNews = getNews();
$newsCount = count($allNews);

$allPartners = getPartners();
$partnerCount = count($allPartners);

$allTestimonials = getTestimonials();
$testiCount = count($allTestimonials);

$dbCats = getCategories();
$catCount = count($dbCats);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Admin ABKIG</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="admin-layout">

  <!-- Sidebar -->
  <?php $activePage = 'dashboard'; include 'includes/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="admin-main">
    <!-- Top Bar -->
    <div class="admin-topbar">
      <h1>Dashboard</h1>
      <div class="admin-topbar-actions">
        <div class="admin-user">
          <div class="admin-avatar">A</div>
          <span><?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?></span>
        </div>
      </div>
    </div>

    <div class="admin-content">

      <!-- Stat Cards -->
      <div class="admin-stat-grid">
        <div class="admin-stat-card">
          <div class="admin-stat-icon navy">📰</div>
          <div>
            <div class="admin-stat-num"><?= $newsCount ?></div>
            <div class="admin-stat-label">Total Berita</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon gold">🤝</div>
          <div>
            <div class="admin-stat-num"><?= $partnerCount ?></div>
            <div class="admin-stat-label">Total Partner</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon orange">⭐</div>
          <div>
            <div class="admin-stat-num"><?= $testiCount ?></div>
            <div class="admin-stat-label">Testimoni</div>
          </div>
        </div>
        <div class="admin-stat-card">
          <div class="admin-stat-icon green">🏷️</div>
          <div>
            <div class="admin-stat-num"><?= $catCount ?></div>
            <div class="admin-stat-label">Kategori</div>
          </div>
        </div>
      </div>

      <!-- News Table -->
      <div class="admin-card" id="news-table">
        <div class="admin-card-header">
          <h2>Daftar Berita</h2>
          <a href="add_news.php" class="btn btn-primary btn-sm">+ Tambah Berita</a>
        </div>

        <?php if (isset($_GET['deleted'])): ?>
          <div class="alert alert-success" style="margin-bottom:16px;">✅ Berita berhasil dihapus.</div>
        <?php endif; ?>
        <?php if (isset($_GET['saved'])): ?>
          <div class="alert alert-success" style="margin-bottom:16px;">✅ Berita berhasil disimpan.</div>
        <?php endif; ?>

        <?php if (!empty($allNews)): ?>
        <div style="overflow-x:auto;">
          <table class="admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allNews as $item): ?>
              <tr>
                <td style="width:40px;"><?= (int)$item['id'] ?></td>
                <td>
                  <div style="font-weight:600;color:var(--dark-text);margin-bottom:2px;"><?= htmlspecialchars($item['title']) ?></div>
                  <div style="font-size:0.8rem;color:var(--gray-500);"><?= htmlspecialchars(truncate($item['excerpt'], 80)) ?></div>
                </td>
                <td>
                  <span class="program-badge badge-primary"><?= htmlspecialchars($item['category']) ?></span>
                </td>
                <td style="white-space:nowrap;"><?= htmlspecialchars(formatDate($item['date'])) ?></td>
                <td>
                  <div class="action-buttons">
                    <a href="../news-detail.php?id=<?= (int)$item['id'] ?>" class="action-btn" style="background:rgba(25,135,84,0.1);color:#198754;" target="_blank" title="Preview">👁</a>
                    <a href="edit_news.php?id=<?= (int)$item['id'] ?>" class="action-btn edit" title="Edit">✏️ Edit</a>
                    <a href="delete_news.php?id=<?= (int)$item['id'] ?>" class="action-btn delete confirm-delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus berita ini?')">🗑 Hapus</a>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php else: ?>
          <div style="text-align:center;padding:60px 20px;color:var(--gray-400);">
            <div style="font-size:3rem;margin-bottom:12px;">📰</div>
            <p>Belum ada berita. <a href="add_news.php" style="color:var(--navy);">Tambah berita pertama →</a></p>
          </div>
        <?php endif; ?>
      </div>

    </div><!-- /admin-content -->
  </main>
</div>
<script src="../assets/js/main.js"></script>
</body>
</html>
