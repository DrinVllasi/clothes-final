<?php
session_start();
include_once('config.php');

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

        // Calculate order total
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $shipping = 5.99;
        $total = $subtotal + $shipping;

        // Check if phone column exists
        $check_column = $conn->query("SHOW COLUMNS FROM orders LIKE 'phone'");
        $has_phone_column = $check_column->rowCount() > 0;

        if ($has_phone_column) {
            // Insert order with phone
            $sql = "INSERT INTO orders (user_id, username, email, phone, address, total_amount, order_date) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                $user_id,
                $username,
                $email,
                $phone,
                $address,
                $total
            ]);
        } else {
            // Insert order without phone
            $sql = "INSERT INTO orders (user_id, username, email, address, total_amount, order_date) 
                    VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                $user_id,
                $username,
                $email,
                $address,
                $total
            ]);
        }

        if ($result) {
            // Clear the cart after successful order
            $_SESSION['cart'] = [];
            
            // Redirect to success page
            header('Location: order_success.php');
            exit;
        } else {
            throw new Exception("Failed to insert order");
        }
    } catch(Exception $e) {
        $error_message = "Error processing your order: " . $e->getMessage();
    }
}

// Calculate totals for display
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$shipping = 5.99;
$total = $subtotal + $shipping;

// Include header and fonts after all potential redirects
include 'header.php';
include 'fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4 prata-font">Checkout</h2>
        
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger text-center mb-4">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title prata-font mb-4">Shipping Information</h5>
                        <form method="POST" action="checkout.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required 
                                       pattern="[0-9]{10,}" title="Please enter a valid phone number (minimum 10 digits)">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Shipping Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="alert alert-info">
                                    <strong>Payment Method:</strong> Cash on Delivery
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark rounded-0 prata-font">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title prata-font">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>$<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span>$<?php echo number_format($shipping, 2); ?></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total:</strong>
                            <strong>$<?php echo number_format($total, 2); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .prata-font { font-family: 'Prata', serif; }
        .card { border-radius: 0; border: 1px solid #ddd; }
        .btn { font-family: 'Prata', serif; }
    </style>

    <?php include 'footer.php'; ?>
</body>
</html> 