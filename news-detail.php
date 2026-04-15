<?php
/**
 * ABKIG - Dynamic News Detail Page
 */
$currentPage = 'newsroom';
$baseUrl = '';
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$news = $id > 0 ? getNewsById($id) : null;

if (!$news) {
    header('HTTP/1.0 404 Not Found');
    header('Location: newsroom.php');
    exit;
}

$relatedNews = getLatestNews(3, $id);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= e(truncate($news['excerpt'], 155)) ?>">
  <title><?= e($news['title']) ?> — ABKIG Newsroom</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Add some specific overrides for the new 2-column hero layout if they aren't in style.css */
    .article-hero {
      background-color: var(--navy);
      color: var(--white);
      padding: 100px 0 60px;
    }
    .hero-grid {
      display: grid;
      grid-template-columns: 1.4fr 1fr;
      gap: 40px;
      align-items: center;
    }
    .category-label-small {
      display: inline-block;
      background-color: var(--gold);
      color: var(--navy);
      padding: 4px 12px;
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 20px;
      border-radius: 2px;
    }
    .article-hero h1 {
      font-family: var(--playfair);
      font-size: 2.75rem;
      line-height: 1.2;
      margin-bottom: 24px;
      color: white;
    }
    .hero-article-meta {
      font-size: 0.95rem;
      color: rgba(255,255,255,0.7);
    }
    .hero-image-wrap img {
      width: 100%;
      height: auto;
      aspect-ratio: 16 / 9;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    
    .news-body-grid {
      display: grid;
      grid-template-columns: 68% 32%;
      gap: 50px;
      padding: 60px 0;
    }
    .article-lead-text {
      font-size: 1.2rem;
      font-weight: 600;
      color: var(--navy);
      margin-bottom: 30px;
      line-height: 1.6;
    }
    .article-content-rich {
      font-size: 1.1rem;
      line-height: 1.8;
      color: var(--gray-700);
      text-align: justify;
    }
    .article-content-rich p { margin-bottom: 24px; }
    
    .sidebar-widget { margin-bottom: 40px; }
    .sidebar-widget-title {
      font-family: var(--playfair);
      font-size: 1.5rem;
      color: var(--navy);
      margin-bottom: 25px;
      border-bottom: 2px solid var(--gold);
      display: inline-block;
      padding-bottom: 5px;
    }
    
    .share-btn-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .share-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 16px;
      background-color: var(--light-gray);
      text-decoration: none;
      color: var(--navy);
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.2s;
      border-radius: 4px;
    }
    .share-link:hover {
      background-color: var(--navy);
      color: white;
    }
    
    @media (max-width: 991px) {
      .hero-grid, .news-body-grid { grid-template-columns: 1fr; }
      .article-hero h1 { font-size: 2.2rem; }
      .article-hero { text-align: center; }
      .category-label-small { margin: 0 auto 20px; }
    }
  </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<!-- Breadcrumb (Keep for navigation as suggested) -->
<div style="background:var(--light-gray);padding:100px 0 20px; border-bottom:1px solid #eee;">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb" style="font-size:0.875rem;">
      <a href="index.php" style="color:var(--navy);text-decoration:none;">Home</a>
      <span style="margin:0 8px;opacity:0.5;">›</span>
      <a href="newsroom.php" style="color:var(--navy);text-decoration:none;">Newsroom</a>
      <span style="margin:0 8px;opacity:0.5;">›</span>
      <span style="color:var(--gray-500);"><?= e(truncate($news['title'], 40)) ?></span>
    </nav>
  </div>
</div>

<!-- ARTICLE HERO SECTION -->
<section class="article-hero">
  <div class="container hero-grid">
    <div class="hero-text-block">
      <span class="category-label-small"><?= e($news['category']) ?></span>
      <h1><?= e($news['title']) ?></h1>
      <div class="hero-article-meta">
        Dipublikasikan pada <strong><?= formatDate($news['date']) ?></strong>
      </div>
    </div>
    <div class="hero-image-wrap">
      <?php if (!empty($news['thumbnail']) && file_exists($news['thumbnail'])): ?>
        <img src="<?= e($news['thumbnail']) ?>" alt="<?= e($news['title']) ?>">
      <?php else: ?>
        <div style="aspect-ratio:16/9; background:rgba(255,255,255,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:3rem;">📰</div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- MAIN CONTENT LAYOUT -->
<div class="container">
  <div class="news-body-grid">
    
    <!-- MAIN ARTICLE COLUMN -->
    <main class="main-article-column">
      <article>
        <!-- Lead Text / Excerpt -->
        <?php if (!empty($news['excerpt'])): ?>
          <div class="article-lead-text">
            <?= e($news['excerpt']) ?>
          </div>
        <?php endif; ?>

        <!-- Content Rich -->
        <div class="article-content-rich">
          <?= $news['content'] ?>
        </div>

        <!-- Back Link -->
        <div style="margin-top:50px; padding-top:25px; border-top:1px solid #eee;">
          <a href="newsroom.php" style="text-decoration:none; color:var(--navy); font-weight:700;">← Kembali ke Newsroom</a>
        </div>
      </article>
    </main>

    <!-- SIDEBAR COLUMN -->
    <aside class="news-detail-sidebar">
      
      <!-- Share Module -->
      <div class="sidebar-widget">
        <h3 class="sidebar-widget-title">Bagikan Berita</h3>
        <div class="share-btn-list">
          <?php 
          $currentUrl = urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
          $shareTitle = urlencode($news['title']);
          ?>
          <a href="https://wa.me/?text=<?= $shareTitle ?>%20<?= $currentUrl ?>" target="_blank" class="share-link">
            <span>📱</span> WhatsApp
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $currentUrl ?>" target="_blank" class="share-link">
            <span>📘</span> Facebook
          </a>
          <a href="https://twitter.com/intent/tweet?text=<?= $shareTitle ?>&url=<?= $currentUrl ?>" target="_blank" class="share-link">
            <span>🐦</span> Twitter / X
          </a>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $currentUrl ?>" target="_blank" class="share-link">
            <span>💼</span> LinkedIn
          </a>
        </div>
      </div>

      <!-- Latest News Widget -->
      <?php if (!empty($relatedNews)): ?>
      <div class="sidebar-widget">
        <h3 class="sidebar-widget-title">Berita Terbaru</h3>
        <?php foreach ($relatedNews as $item): ?>
          <a href="news-detail.php?id=<?= (int)$item['id'] ?>" style="display:grid; grid-template-columns:80px 1fr; gap:15px; margin-bottom:20px; text-decoration:none; color:inherit;">
            <div style="width:80px; height:60px; background:#ddd; border-radius:4px; overflow:hidden;">
              <?php if (!empty($item['thumbnail']) && file_exists($item['thumbnail'])): ?>
                <img src="<?= e($item['thumbnail']) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
              <?php else: ?>
                <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:#eee;">📰</div>
              <?php endif; ?>
            </div>
            <div>
              <h4 style="font-size:0.95rem; line-height:1.3; margin-bottom:4px;"><?= e($item['title']) ?></h4>
              <span style="font-size:0.75rem; color:var(--gold); font-weight:700; text-transform:uppercase;">Baca Artikel »</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </aside>

  </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>
