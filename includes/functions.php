<?php
/**
 * ABKIG - Shared Functions
 */

require_once __DIR__ . '/db.php';

// =============================================
// NEWS FUNCTIONS
// =============================================

/**
 * Load all news from Database
 */
function getNews() {
    $pdo = getDB();
    $stmt = $pdo->query("SELECT * FROM news ORDER BY date DESC, id DESC");
    return $stmt->fetchAll();
}

/**
 * Get single news by ID
 */
function getNewsById(int $id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

/**
 * Get N latest news items, optionally excluding one ID
 */
function getLatestNews(int $n = 3, int $excludeId = 0): array {
    $pdo = getDB();
    $sql = "SELECT * FROM news WHERE id != ? ORDER BY date DESC, id DESC LIMIT " . (int)$n;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$excludeId]);
    return $stmt->fetchAll();
}

/**
 * Add a new news item
 */
function addNews(array $data) {
    $pdo = getDB();
    $sql = "INSERT INTO news (title, category, date, thumbnail, excerpt, content) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['title'],
        $data['category'],
        $data['date'],
        $data['thumbnail'],
        $data['excerpt'],
        $data['content']
    ]);
}

/**
 * Update an existing news item
 */
function updateNews(int $id, array $data) {
    $pdo = getDB();
    $sql = "UPDATE news SET title = ?, category = ?, date = ?, thumbnail = ?, excerpt = ?, content = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['title'],
        $data['category'],
        $data['date'],
        $data['thumbnail'],
        $data['excerpt'],
        $data['content'],
        $id
    ]);
}

/**
 * Delete a news item
 */
function deleteNews(int $id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("DELETE FROM news WHERE id = ?");
    return $stmt->execute([$id]);
}

// =============================================
// PARTNER & TESTIMONIAL FUNCTIONS
// =============================================

function getPartners() {
    $pdo = getDB();
    return $pdo->query("SELECT * FROM partners ORDER BY id ASC")->fetchAll();
}

function getTestimonials() {
    $pdo = getDB();
    return $pdo->query("SELECT * FROM testimonials ORDER BY id DESC")->fetchAll();
}

// =============================================
// CATEGORY FUNCTIONS
// =============================================

function getCategories() {
    $pdo = getDB();
    return $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
}

function addCategory(string $name) {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
    return $stmt->execute([$name]);
}

function deleteCategory(int $id) {
    $pdo = getDB();
    
    // 1. Get the name of the category to be deleted
    $stmt = $pdo->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    $cat = $stmt->fetch();
    
    if (!$cat) return false;
    $catName = $cat['name'];

    // 2. Delete the category
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$id]);

    // 3. Update news items using this category to "Tanpa Kategori"
    $stmt = $pdo->prepare("UPDATE news SET category = 'Tanpa Kategori' WHERE category = ?");
    return $stmt->execute([$catName]);
}

// =============================================
// PARTNER FUNCTIONS
// =============================================

function addPartner(string $name, string $logo) {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO partners (name, logo) VALUES (?, ?)");
    return $stmt->execute([$name, $logo]);
}

function deletePartner(int $id) {
    $pdo = getDB();
    // Fetch info for optional file cleanup
    $stmt = $pdo->prepare("SELECT logo FROM partners WHERE id = ?");
    $stmt->execute([$id]);
    $partner = $stmt->fetch();
    
    $stmt = $pdo->prepare("DELETE FROM partners WHERE id = ?");
    $success = $stmt->execute([$id]);
    
    // Potential cleanup: if ($success && $partner) @unlink($partner['logo']);
    return $success;
}

function getPartnerById(int $id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM partners WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updatePartner(int $id, string $name, string $logo = '') {
    $pdo = getDB();
    if ($logo) {
        $stmt = $pdo->prepare("UPDATE partners SET name = ?, logo = ? WHERE id = ?");
        return $stmt->execute([$name, $logo, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE partners SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }
}

// =============================================
// TESTIMONIAL FUNCTIONS
// =============================================

function addTestimonial(string $name, string $role, string $content, string $image) {
    $pdo = getDB();
    $stmt = $pdo->prepare("INSERT INTO testimonials (name, role, content, image) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $role, $content, $image]);
}

function deleteTestimonial(int $id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id = ?");
    return $stmt->execute([$id]);
}

function getTestimonialById(int $id) {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM testimonials WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateTestimonial(int $id, string $name, string $role, string $content, string $image = '') {
    $pdo = getDB();
    if ($image) {
        $stmt = $pdo->prepare("UPDATE testimonials SET name = ?, role = ?, content = ?, image = ? WHERE id = ?");
        return $stmt->execute([$name, $role, $content, $image, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE testimonials SET name = ?, role = ?, content = ? WHERE id = ?");
        return $stmt->execute([$name, $role, $content, $id]);
    }
}

// =============================================
// UTILITY FUNCTIONS
// =============================================

/**
 * Format date to Indonesian format
 */
function formatDate(string $date): string {
    $months = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April',   '05' => 'Mei',       '06' => 'Juni',
        '07' => 'Juli',    '08' => 'Agustus',   '09' => 'September',
        '10' => 'Oktober', '11' => 'November',  '12' => 'Desember',
    ];
    if (!$date) return '';
    $parts = explode('-', $date);
    if (count($parts) !== 3) return $date;
    list($year, $month, $day) = $parts;
    return (int)$day . ' ' . ($months[$month] ?? $month) . ' ' . $year;
}

/**
 * Escape HTML output
 */
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Truncate text
 */
function truncate(string $text, int $length = 150): string {
    $text = strip_tags($text);
    if (strlen($text) <= $length) return $text;
    return substr($text, 0, $length) . '...';
}

/**
 * Active nav class helper
 */
function navActive(string $page): string {
    $current = basename($_SERVER['PHP_SELF']);
    return $current === $page ? 'active' : '';
}

/**
 * Get category badge color class
 */
function getCategoryClass(string $category): string {
    $map = [
        'Pengumuman' => 'badge-primary',
        'Akademik'   => 'badge-gold',
        'Kemitraan'  => 'badge-orange',
    ];
    return $map[$category] ?? 'badge-primary';
}

/**
 * Get initials from a name (e.g. "Le Cordon Bleu" -> "LCB")
 */
function getPartnerInitials(string $name): string {
    $words = explode(' ', $name);
    $initials = '';
    foreach ($words as $w) {
        if (!empty($w)) $initials .= strtoupper($w[0]);
    }
    return substr($initials, 0, 3); // Max 3 chars
}

// =============================================
// FILE UPLOAD
// =============================================

/**
 * Handle image upload
 * Returns the relative path or empty string on failure
 */
function handleImageUpload(array $file, string $prefix = 'news', string $subDir = 'news'): string {
    if ($file['error'] !== UPLOAD_ERR_OK) return '';

    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowed)) return '';
    if ($file['size'] > 5 * 1024 * 1024) return ''; // 5MB max

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $prefix . '_' . time() . '_' . uniqid() . '.' . strtolower($ext);
    
    // Normalize subDir to assets/image/subDir/
    $targetDir = 'assets/image/' . trim($subDir, '/') . '/';
    $fullDir = dirname(__DIR__) . '/' . $targetDir;

    if (!is_dir($fullDir)) mkdir($fullDir, 0755, true);

    if (move_uploaded_file($file['tmp_name'], $fullDir . $filename)) {
        return $targetDir . $filename;
    }
    return '';
}

// =============================================
// SESSION / AUTH
// =============================================

function requireAdminLogin(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['admin_logged_in'])) {
        header('Location: ' . getAdminBase() . 'index.php?logout=1');
        exit;
    }
}

function getAdminBase(): string {
    // Relative path to admin/ from admin files
    return './';
}
