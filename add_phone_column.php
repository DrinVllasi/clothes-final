<?php
include_once('config.php');

try {
    // First check if the phone column exists
    $check_column = $conn->query("SHOW COLUMNS FROM orders LIKE 'phone'");
    
    if ($check_column->rowCount() == 0) {
        // Add the phone column
        $sql = "ALTER TABLE orders ADD COLUMN phone VARCHAR(20) NOT NULL AFTER email";
        $conn->exec($sql);
        echo "Phone column added successfully!<br>";
    } else {
        echo "Phone column already exists.<br>";
    }
    
    // Show current table structure
    echo "<br>Current table structure:<br>";
    $columns = $conn->query("SHOW COLUMNS FROM orders");
    while ($column = $columns->fetch(PDO::FETCH_ASSOC)) {
        echo $column['Field'] . " - " . $column['Type'] . "<br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 