<?php
session_start();
include_once('config.php');

// Check if user is logged in and is admin
if (!isset($_SESSION['id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 'true') {
    header('Location: login.php');
    exit;
}

// Check if order ID is provided
if (!isset($_GET['id'])) {
    header('Location: orders.php');
    exit;
}

try {
    // Delete the order
    $sql = "DELETE FROM orders WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    
    // Redirect back to orders page
    header('Location: orders.php');
    exit;
} catch(PDOException $e) {
    // If there's an error, redirect back with error message
    header('Location: orders.php?error=' . urlencode('Error deleting order: ' . $e->getMessage()));
    exit;
}
?> 