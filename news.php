<?php
/**
 * News & Events Page
 */

$page_title = "Berita & Event";

include 'includes/header.php';
include 'includes/navbar.php';

// Get all news from database
$conn = include 'config/database.php';
$news_items = [];

$sql = "SELECT * FROM news ORDER BY date DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_items[] = $row;
    }
}

$conn->close();
?>

<main style="margin-top: 100px;">
    <section class="news-all-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">BERITA & ACARA</span>
                <h1 class="section-title" style="font-size: 3rem; font-weight: 400;">
                    Semua Berita dari <span>ABKIG</span>
                </h1>
                <span class="gold-line"></span>
            </div>

            <div class="news-list">
                <?php if (!empty($news_items)): ?>
                    <?php foreach ($news_items as $index => $item): ?>
                        <article class="news-article">
                            <div class="news-article-header">
                                <h2 class="news-article-title"><?php echo htmlspecialchars($item['title']); ?></h2>
                                <div class="news-article-meta">
                                    <span class="article-category"><?php echo htmlspecialchars($item['category']); ?></span>
                                    <span class="article-date"><?php echo date('d M Y', strtotime($item['date'])); ?></span>
                                </div>
                            </div>
                            
                            <?php if (!empty($item['image'])): ?>
                                <div class="news-article-image">
                                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <div class="news-article-content">
                                <p><?php echo nl2br(htmlspecialchars($item['content'])); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 3rem;">
                        <p style="color: var(--text-muted); font-size: 1.1rem;">Tidak ada berita atau acara saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<style>
.news-all-section {
    background: var(--cream);
    padding: 80px 20px;
}

.news-list {
    max-width: 800px;
    margin: 0 auto;
}

.news-article {
    background: white;
    padding: 3rem;
    margin-bottom: 3rem;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-left: 4px solid var(--gold-premium);
    animation: fadeUpArticle 0.6s ease;
}

@keyframes fadeUpArticle {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.news-article:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.news-article-header {
    margin-bottom: 1.5rem;
}

.news-article-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 400;
    color: var(--navy);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.news-article:hover .news-article-title {
    color: var(--accent-orange);
}

.news-article-meta {
    display: flex;
    gap: 1.5rem;
    align-items: center;
    flex-wrap: wrap;
}

.article-category {
    display: inline-block;
    background: linear-gradient(135deg, var(--gold-light), var(--accent-orange));
    color: var(--navy-deep);
    padding: 0.4rem 1rem;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border-radius: 20px;
}

.article-date {
    font-size: 0.95rem;
    color: var(--text-muted);
    font-weight: 500;
}

.news-article-image {
    margin: 2rem 0;
    border-radius: 8px;
    overflow: hidden;
}

.news-article-image img {
    width: 100%;
    height: auto;
    display: block;
}

.news-article-content {
    font-size: 1rem;
    line-height: 1.8;
    color: var(--text-muted);
}

.news-article-content p {
    margin-bottom: 1rem;
}

.news-article-content p:last-child {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .news-all-section {
        padding: 60px 20px;
    }
    
    .news-article {
        padding: 1.5rem;
    }
    
    .news-article-title {
        font-size: 1.6rem;
    }
}
</style>

<?php
include 'includes/footer.php';
include 'includes/fab.php';
?>
</body>
</html>
