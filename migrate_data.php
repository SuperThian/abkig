<?php
/**
 * ABKIG - Data Migration Script
 * Migrates data from JSON and hardcoded arrays to SQL Database
 */

require_once 'includes/functions.php';
$pdo = getDB();

echo "<h2>ABKIG Data Migration</h2>";
echo "<p>Starting migration process...</p>";

// 1. Migrate News
echo "<h3>1. Migrating News...</h3>";
$jsonPath = 'data/news.json';
if (file_exists($jsonPath)) {
    $newsData = json_decode(file_get_contents($jsonPath), true);
    if (is_array($newsData)) {
        $count = 0;
        foreach ($newsData as $news) {
            // Check if exists
            $stmt = $pdo->prepare("SELECT id FROM news WHERE title = ? AND date = ?");
            $stmt->execute([$news['title'], $news['date']]);
            if (!$stmt->fetch()) {
                $sql = "INSERT INTO news (title, category, date, thumbnail, excerpt, content) VALUES (?, ?, ?, ?, ?, ?)";
                $pdo->prepare($sql)->execute([
                    $news['title'],
                    $news['category'],
                    $news['date'],
                    $news['thumbnail'] ?? '',
                    $news['excerpt'] ?? '',
                    $news['content'] ?? ''
                ]);
                $count++;
            }
        }
        echo "<p>✅ Migrated $count news items.</p>";
    }
} else {
    echo "<p>⚠️ News JSON not found. Skipping.</p>";
}

// 2. Migrate Partners
echo "<h3>2. Migrating Partners...</h3>";
$partners = ['CIA', 'Blue Band', 'Novotel', 'Tupperware', 'Le Cordon Bleu', 'Barry Callebaut', 'Unilever Food', 'Marriot'];
$colors = ['var(--navy)', 'var(--orange)', 'var(--gold)', '#2E7D32', '#1a3a6c', '#5D4037', '#0097A7', '#C62828'];

$count = 0;
foreach ($partners as $index => $name) {
    $color = $colors[$index % count($colors)];
    $stmt = $pdo->prepare("SELECT id FROM partners WHERE name = ?");
    $stmt->execute([$name]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO partners (name, color) VALUES (?, ?)")->execute([$name, $color]);
        $count++;
    }
}
echo "<p>✅ Migrated $count partners.</p>";

// 3. Migrate Testimonials
echo "<h3>3. Migrating Testimonials...</h3>";
$testimonials = [
    [
        'name' => 'Andi Setiawan',
        'role' => 'Alumni 2022 · Demi Chef di Hotel Mulia',
        'text' => 'ABKIG memberikan saya fondasi teknik yang sangat kuat sekaligus mindset bisnis. Program praktik 67% benar-benar mempersiapkan saya menghadapi tekanan di dapur profesional hotel bintang 5.'
    ],
    [
        'name' => 'Budi Pratama',
        'role' => 'Alumni 2021 · Owner Bakaria PIK',
        'text' => 'Kurikulum entrepreneurship di ABKIG membantu saya membangun toko kue sendiri hanya setahun setelah lulus. Costing dan manajemen operasional yang diajarkan sangat akurat dengan kondisi nyata.'
    ],
    [
        'name' => 'Citra Lestari',
        'role' => 'Alumni 2019 · Pastry Chef di Singapore',
        'text' => 'Peralatan di akademi ini sangat modern dan standar industri. Para Chef instruktur tidak hanya mengajar resep, tapi juga disiplin dan etika kerja yang dibutuhkan di dunia kuliner global.'
    ],
    [
        'name' => 'Shireen Sungkar',
        'role' => '',
        'text' => 'Terima kasih IPS, sudah memberikan ilmu dan pengalaman dalam dunia kuliner. Semoga terus maju dan berkembang'
    ],
    [
        'name' => 'Yosua Andrew Tan',
        'role' => 'Finalist Junior MasterChef Indonesia Season 2',
        'text' => 'Pengalaman saya belajar di IPS sangat menyenangkan. Bisa belajar banyak resep baru yang membantu saya untuk menunjang karier saya saat ini.'
    ]
];

$count = 0;
foreach ($testimonials as $t) {
    $stmt = $pdo->prepare("SELECT id FROM testimonials WHERE name = ?");
    $stmt->execute([$t['name']]);
    if (!$stmt->fetch()) {
        $pdo->prepare("INSERT INTO testimonials (name, role, text) VALUES (?, ?, ?)")->execute([
            $t['name'],
            $t['role'],
            $t['text']
        ]);
        $count++;
    }
}
echo "<p>✅ Migrated $count testimonials.</p>";

echo "<hr><p><strong>Migration Completed!</strong></p>";
echo "<p><a href='index.php'>Go to Homepage</a> | <a href='admin/index.php'>Go to Admin Panel</a></p>";
