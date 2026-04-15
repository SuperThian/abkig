<?php
/**
 * ABKIG - DB Column Fix
 * Runs ALTER TABLE commands to fix mismatched column names.
 */
require_once 'includes/functions.php';

$pdo = getDB();

echo "<h2>Database Synchronization</h2>";

try {
    // 1. Fix Partners Table
    // Check if 'color' exists and 'logo' doesn't
    $res = $pdo->query("SHOW COLUMNS FROM partners");
    $columns = $res->fetchAll(PDO::FETCH_COLUMN);
    
    if (in_array('color', $columns) && !in_array('logo', $columns)) {
        $pdo->exec("ALTER TABLE partners CHANGE color logo varchar(255)");
        echo "<p>✅ Fixed: 'partners.color' renamed to 'partners.logo'</p>";
    } elseif (!in_array('logo', $columns)) {
        $pdo->exec("ALTER TABLE partners ADD logo varchar(255) AFTER name");
        echo "<p>✅ Fixed: Added 'logo' column to 'partners'</p>";
    } else {
        echo "<p>ℹ️ Partners table is already correct.</p>";
    }

    // 2. Fix Testimonials Table
    $res = $pdo->query("SHOW COLUMNS FROM testimonials");
    $columns = $res->fetchAll(PDO::FETCH_COLUMN);

    if (in_array('text', $columns)) {
        $pdo->exec("ALTER TABLE testimonials CHANGE text content text NOT NULL");
        echo "<p>✅ Fixed: 'testimonials.text' renamed to 'testimonials.content'</p>";
    }
    
    if (in_array('avatar', $columns)) {
        $pdo->exec("ALTER TABLE testimonials CHANGE avatar image varchar(255)");
        echo "<p>✅ Fixed: 'testimonials.avatar' renamed to 'testimonials.image'</p>";
    }

    echo "<h3>Semua kolom berhasil disinkronkan!</h3>";
    echo "<p><a href='admin/testimonials.php'>Kembali ke Daftar Testimoni</a></p>";

} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Error: " . $e->getMessage() . "</p>";
}
?>
