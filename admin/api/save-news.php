<?php
/**
 * Save News API
 */

header('Content-Type: application/json');

$conn = include '../../config/database.php';
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['news'])) {
    echo json_encode(['success' => false, 'message' => 'No news data provided']);
    exit;
}

$news = $data['news'];
$edit_index = $data['editIndex'];

$title = $news['title'];
$category = $news['category'];
$excerpt = $news['excerpt'];
$content = $news['content'];
$image = $news['image'] ?? '';
$date = $news['date'];

if ($edit_index !== null && $edit_index !== 'null') {
    // Update existing news
    $stmt = $conn->prepare("UPDATE news SET title=?, category=?, excerpt=?, content=?, image=?, date=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $category, $excerpt, $content, $image, $date, $edit_index);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'News updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update news: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    // Insert new news
    $stmt = $conn->prepare("INSERT INTO news (title, category, excerpt, content, image, date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $category, $excerpt, $content, $image, $date);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'News saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save news: ' . $stmt->error]);
    }
    $stmt->close();
}

$conn->close();

