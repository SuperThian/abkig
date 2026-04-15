<?php
/**
 * ABKIG - Seed Categories
 * Self-healing script that creates the table and populates it.
 */
require_once 'includes/functions.php';

$pdo = getDB();

// 1. Create table if not exists (Self-healing)
$sql = "CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

try {
    $pdo->exec($sql);
    echo "<p>✅ Table 'categories' verified/created.</p>";
} catch (PDOException $e) {
    die("<p>❌ Error creating table: " . $e->getMessage() . "</p>");
}

// 2. Seed initial categories
$initialCats = ['Pengumuman', 'Akademik', 'Kemitraan', 'Prestasi', 'Kegiatan', 'Lainnya', 'Tanpa Kategori'];
$count = 0;

foreach ($initialCats as $cat) {
    $stmt = $pdo->prepare("SELECT id FROM categories WHERE name = ?");
    $stmt->execute([$cat]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$cat]);
        $count++;
    }
}

echo "<p>✅ Seeded $count initial categories.</p>";
echo "<hr><p><a href='admin/categories.php'>Back to Category Management</a></p>";
?>

