<?php
/**
 * ABKIG - Database Connection
 * Use PDO for secure database access
 */

$db_config = [
    'host' => 'localhost',
    'dbname' => 'abkig_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];

try {
    $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $db_config['username'], $db_config['password'], $options);
} catch (\PDOException $e) {
    // In production, log error and show a generic message
    // For development, we show the message
    die("Database connection failed: " . $e->getMessage());
}

/**
 * Helper to get PDO instance globally
 */
function getDB() {
    global $pdo;
    return $pdo;
}
