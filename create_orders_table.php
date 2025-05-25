<?php
include_once('config.php');

try {
    // Drop the table if it exists
    $conn->exec("DROP TABLE IF EXISTS orders");
    
    // Create orders table
    $sql = "CREATE TABLE orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        address TEXT NOT NULL,
        total_amount DECIMAL(10,2) NOT NULL,
        order_date DATETIME NOT NULL
    )";
    
    $conn->exec($sql);
    echo "Orders table created successfully";
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?> 