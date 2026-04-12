<?php
/**
 * Delete News API
 */

header('Content-Type: application/json');

$conn = include '../../config/database.php';
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'No ID provided']);
    exit;
}

$id = intval($data['id']);

$stmt = $conn->prepare("DELETE FROM news WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'News deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete news: ' . $stmt->error]);
}

$stmt->close();
$conn->close();

