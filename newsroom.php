<?php
/**
 * ABKIG - Newsroom Page
 */
$currentPage = 'newsroom';
$baseUrl = '';
require_once 'includes/functions.php';

$allNews = getNews();
$perPage = 6;
$totalNews = count($allNews);
$totalPages = max(1, ceil($totalNews / $perPage));
$currentPageNum = isset($_GET['page']) ? max(1, min($totalPages, (int)$_GET['page'])) : 1;
$offset = ($currentPageNum - 1) * $perPage;
$pagedNews = array_slice($allNews, $offset, $perPage);

$categories = array_unique(array_column($allNews, 'category'));
sort($categories);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Newsroom ABKIG — Berita terbaru, pengumuman, dan informasi seputar Akademi Bisnis Kuliner Indonesia Global.">
  <title>Newsroom — ABKIG</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        <span class="current">Newsroom</span>
      </nav>
      <h1>Newsroom</h1>
      <p style="color:rgba(255,255,255,0.75);max-width:560px;margin-top:12px;">
        Berita terkini, pengumuman, dan informasi penting seputar ABKIG dan dunia pendidikan kuliner.
      </p>
    </div>
  </div>
</section>

<!-- =============================================
     NEWSROOM
     ============================================= -->
<section class="section bg-white" id="newsroom">
  <div class="container">

    <!-- Filter Kategori -->
    <?php if (!empty($categories)): ?>
    <div class="news-filter" role="group" aria-label="Filter kategori berita">
      <button class="filter-btn active" data-filter="all">Semua</button>
      <?php foreach ($categories as $cat): ?>
        <button class="filter-btn" data-filter="<?= e($cat) ?>"><?= e($cat) ?></button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- News Grid -->
    <div class="news-grid" id="newsGrid">
      <?php if (!empty($pagedNews)): ?>
        <?php foreach ($pagedNews as $news): ?>
        <article class="news-card fade-in" data-category="<?= e($news['category']) ?>">
          <div class="news-card-img">
            <?php if (!empty($news['thumbnail']) && file_exists($news['thumbnail'])): ?>
              <img src="<?= e($news['thumbnail']) ?>" alt="<?= e($news['title']) ?>" loading="lazy">
            <?php else: ?>
              <div class="news-card-img-placeholder">
                <?php
                $icons = ['📰','📣','🎓','🤝','🍰','📊'];
                echo $icons[array_rand($icons)];
                ?>
              </div>
            <?php endif; ?>
            <div class="news-category-badge"><?= e($news['category']) ?></div>
          </div>
          <div class="news-card-body">
            <div class="news-date">📅 <?= formatDate($news['date']) ?></div>
            <h3><a href="news-detail.php?id=<?= (int)$news['id'] ?>"><?= e($news['title']) ?></a></h3>
            <p><?= e(truncate($news['excerpt'], 140)) ?></p>
            <a href="news-detail.php?id=<?= (int)$news['id'] ?>" class="news-read-more">
              Baca Selengkapnya <span>→</span>
            </a>
          </div>
        </article>
        <?php endforeach; ?>
      <?php else: ?>
        <div style="grid-column:1/-1;text-align:center;padding:80px 20px;">
          <div style="font-size:4rem;margin-bottom:16px;">📰</div>
          <h3 style="margin-bottom:8px;color:var(--gray-500);">Belum Ada Berita</h3>
          <p style="color:var(--gray-400);">Berita akan segera ditambahkan. Silakan cek kembali nanti.</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <nav class="pagination" aria-label="Navigasi halaman berita">
      <?php if ($currentPageNum > 1): ?>
        <a href="?page=<?= $currentPageNum - 1 ?>" class="page-btn prev">← Prev</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="page-btn <?= $i === $currentPageNum ? 'active' : '' ?>" <?= $i === $currentPageNum ? 'aria-current="page"' : '' ?>>
          <?= $i ?>
        </a>
      <?php endfor; ?>

      <?php if ($currentPageNum < $totalPages): ?>
        <a href="?page=<?= $currentPageNum + 1 ?>" class="page-btn next">Next →</a>
      <?php endif; ?>
    </nav>
    <?php endif; ?>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>
