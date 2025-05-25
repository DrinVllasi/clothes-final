<?php
session_start();

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'] ?? '';
$price = $data['price'] ?? '';
$image = $data['image'] ?? '';
$size = $data['size'] ?? '';

if (!$name || !$price || !$image || !$size) {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
    exit;
}

// Initialize cart if needed
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if item already exists
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $name && $item['size'] === $size) {
        $item['quantity']++;
        $found = true;
        break;
    }
}

// If not found, add new item
if (!$found) {
    $_SESSION['cart'][] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'size' => $size,
        'quantity' => 1
    ];
}

echo json_encode(['success' => true]); 