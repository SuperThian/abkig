<?php
/**
 * Get News API
 */

header('Content-Type: application/json');

$conn = include '../../config/database.php';

$sql = "SELECT * FROM news ORDER BY date DESC";
$result = $conn->query($sql);

$news = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}

echo json_encode(['success' => true, 'news' => $news]);

$conn->close();

