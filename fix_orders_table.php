<?php
include_once('config.php');

try {
    // Drop the existing table
    $conn->exec("DROP TABLE IF EXISTS orders");
    
    // Create the table with all required columns
    $sql = "CREATE TABLE orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        address TEXT NOT NULL,
        total_amount DECIMAL(10,2) NOT NULL,
        order_date DATETIME NOT NULL
    )";
    
    $conn->exec($sql);
    echo "Orders table created successfully with all required columns!<br>";
    
    // Verify the structure
    echo "<br>Table structure:<br>";
    $columns = $conn->query("SHOW COLUMNS FROM orders");
    while ($column = $columns->fetch(PDO::FETCH_ASSOC)) {
        echo $column['Field'] . " - " . $column['Type'] . "<br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 