<?php
/**
 * News & Events Section
 */

// Get news data from database
$conn = include 'config/database.php';
$news_items = [];

$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 3";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_items[] = $row;
    }
}

$conn->close();
?>

<section class="news-section" id="news">
    <div class="container">
        <div class="section-header">
            <span class="section-label">BERITA & ACARA</span>
            <h2 class="section-title">
                Update Terbaru dari <span>ABKIG</span>
            </h2>
            <p class="section-subtitle">
                Ikuti perkembangan program, acara, dan pencapaian siswa kami
            </p>
            <span class="gold-line"></span>
        </div>

        <div class="news-grid">
            <?php if (!empty($news_items)): ?>
                <?php foreach ($news_items as $index => $item): ?>
                    <div class="news-card" style="animation-delay: <?php echo $index * 0.1; ?>s">
                        <?php if (!empty($item['image'])): ?>
                            <div class="news-image">
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="news-content">
                            <div class="news-meta">
                                <span class="news-category"><?php echo htmlspecialchars($item['category']); ?></span>
                                <span class="news-date"><?php echo date('d M Y', strtotime($item['date'])); ?></span>
                            </div>
                            
                            <h3 class="news-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            
                            <p class="news-excerpt">
                                <?php echo htmlspecialchars(substr($item['excerpt'], 0, 120)) . '...'; ?>
                            </p>
                            
                            <a href="javascript:void(0)" class="news-read-more" onclick="openNewsModal(<?php echo $index + ($item['id'] ?? 'unknown'); ?>)">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 3rem; grid-column: 1/-1;">
                    <p style="color: var(--text-muted); font-size: 1rem;">Tidak ada berita atau acara saat ini.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($news_items)): ?>
            <div class="section-cta">
                <a href="news.php" class="btn btn-secondary">Lihat Semua Berita</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.news-section {
    background: var(--cream);
    padding: 80px 20px;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.news-card {
    background: var(--white);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    animation: fadeUpCard 0.8s ease forwards;
    opacity: 0;
    cursor: pointer;
}

@keyframes fadeUpCard {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.news-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: linear-gradient(135deg, #d4af37, #ff6b35);
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-content {
    padding: 1.8rem;
}

.news-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 0.8rem;
    align-items: center;
}

.news-category {
    display: inline-block;
    background: linear-gradient(135deg, var(--gold-light), var(--accent-orange));
    color: var(--navy-deep);
    padding: 0.3rem 0.8rem;
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border-radius: 20px;
}

.news-date {
    font-size: 0.75rem;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.05em;
}

.news-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.4rem;
    font-weight: 400;
    color: var(--navy);
    margin-bottom: 0.8rem;
    line-height: 1.4;
}

.news-card:hover .news-title {
    color: var(--accent-orange);
}

.news-excerpt {
    font-size: 0.9rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 1.2rem;
}

.news-read-more {
    display: inline-block;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--accent-orange);
    text-decoration: none;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
    position: relative;
}

.news-read-more::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--accent-orange);
    transition: width 0.3s ease;
}

.news-read-more:hover::after {
    width: 100%;
}

.section-cta {
    text-align: center;
}

@media (max-width: 768px) {
    .news-section {
        padding: 60px 20px;
    }

    .news-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .news-card {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
    }

    .news-image {
        height: 150px;
    }
}
</style>
