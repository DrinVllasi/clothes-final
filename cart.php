<?php
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_ajax_request = isset($_POST['ajax_update']) && $_POST['ajax_update'] == 'true';

    if (isset($_POST['update_quantity'])) {
        $index = $_POST['index'];
        $change = (int)$_POST['change']; // Ensure change is an integer

        if (isset($_SESSION['cart'][$index])) {
            $newQuantity = $_SESSION['cart'][$index]['quantity'] + $change;
            if ($newQuantity >= 1) {
                $_SESSION['cart'][$index]['quantity'] = $newQuantity;
            }
            
            if ($is_ajax_request) {
                // Calculate new totals for JSON response
                $item = $_SESSION['cart'][$index];
                $itemTotal = $item['price'] * $item['quantity'];
                
                $subtotal = 0;
                foreach ($_SESSION['cart'] as $cartItem) {
                    $subtotal += $cartItem['price'] * $cartItem['quantity'];
                }
                $shipping = !empty($_SESSION['cart']) ? 5.99 : 0;
                $total = $subtotal + $shipping;

                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'newQuantity' => $item['quantity'],
                    'itemTotal' => number_format($itemTotal, 2),
                    'subtotal' => number_format($subtotal, 2),
                    'shipping' => number_format($shipping, 2),
                    'total' => number_format($total, 2),
                    'canDecrease' => $item['quantity'] > 1
                ]);
                exit;
            }
        }
    } elseif (isset($_POST['remove_index'])) {
        $index = $_POST['remove_index'];
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
        }
    } elseif (isset($_POST['clear_cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if (!$is_ajax_request) {
        header('Location: cart.php');
        exit;
    }
}

include 'header.php';
include 'fonts.php';

// Calculate totals for page display
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$shipping = !empty($_SESSION['cart']) ? 5.99 : 0;
$total = $subtotal + $shipping;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4 prata-font">Shopping Cart</h2>
        
        <?php if (empty($_SESSION['cart'])): ?>
            <div class="text-center mt-5">
                <h3 class="prata-font mb-4">Your cart is empty</h3>
                <a href="firstpage.php" class="btn btn-dark rounded-0 prata-font">Continue Shopping</a>
            </div>
        <?php else: ?>
            <div class="cart-container">
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <div class="card mb-3 item-row" data-index="<?php echo $index; ?>">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                                             class="img-fluid rounded-start" 
                                             alt="<?php echo htmlspecialchars($item['name']); ?>"
                                             style="max-height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title prata-font"><?php echo htmlspecialchars($item['name']); ?></h5>
                                            <p class="card-text prata-font">
                                                Size: <?php echo htmlspecialchars($item['size']); ?><br>
                                                Price: $<?php echo number_format($item['price'], 2); ?>
                                            </p>
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="me-2 prata-font" style="font-size: 1em;">Quantity:</span>
                                                <button class="btn btn-outline-dark btn-sm quantity-change" data-change="-1" <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?> style="font-weight: bold; width: 25px; height: 25px; padding: 0;">-</button>
                                                <span class="mx-2 prata-font item-quantity" style="font-size: 1em;"><?php echo $item['quantity']; ?></span>
                                                <button class="btn btn-outline-dark btn-sm quantity-change" data-change="1" style="font-weight: bold; width: 25px; height: 25px; padding: 0;">+</button>
                                            </div>
                                            <p class="card-text item-total-price">
                                                <strong>Total: $<?php echo number_format($item['price'] * $item['quantity'], 2); ?></strong>
                                            </p>
                                            <form method="POST" class="d-inline mt-2">
                                                <input type="hidden" name="remove_index" value="<?php echo $index; ?>">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title prata-font">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span id="cart-subtotal">$<?php echo number_format($subtotal, 2); ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Shipping:</span>
                                    <span id="cart-shipping">$<?php echo number_format($shipping, 2); ?></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-3">
                                    <strong>Total:</strong>
                                    <strong id="cart-total">$<?php echo number_format($total, 2); ?></strong>
                                </div>
                                <a href="checkout.php" class="btn btn-dark w-100 mb-2 rounded-0 prata-font">Proceed to Checkout</a>
                                <form method="POST">
                                    <input type="hidden" name="clear_cart" value="1">
                                    <button type="submit" class="btn btn-outline-dark w-100 rounded-0 prata-font">Clear Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <style>
        .prata-font { font-family: 'Prata', serif; }
        .card { border-radius: 0; border: 1px solid #ddd; }
        .btn { font-family: 'Prata', serif; }
        .quantity-change { /* width: 30px; height: 30px; */ padding: 0; display: flex; align-items: center; justify-content: center; }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.quantity-change').forEach(button => {
            button.addEventListener('click', function() {
                const itemRow = this.closest('.item-row');
                const index = itemRow.dataset.index;
                const change = parseInt(this.dataset.change);
                const currentQuantity = parseInt(itemRow.querySelector('.item-quantity').textContent);

                if (currentQuantity + change < 1 && change < 0) {
                    return; // Should be handled by disabled state, but good to double check
                }

                const formData = new FormData();
                formData.append('index', index);
                formData.append('change', change);
                formData.append('update_quantity', '1');
                formData.append('ajax_update', 'true');

                fetch('cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        itemRow.querySelector('.item-quantity').textContent = data.newQuantity;
                        itemRow.querySelector('.item-total-price strong').textContent = 'Total: $' + data.itemTotal;
                        
                        document.getElementById('cart-subtotal').textContent = '$' + data.subtotal;
                        document.getElementById('cart-shipping').textContent = '$' + data.shipping;
                        document.getElementById('cart-total').textContent = '$' + data.total;

                        // Update disabled state of minus button
                        const minusButton = itemRow.querySelector('.quantity-change[data-change="-1"] ');
                        if (minusButton) {
                            minusButton.disabled = !data.canDecrease;
                        }
                    } else {
                        // Handle error - maybe show a message to the user
                        console.error('Error updating quantity:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
            });
        });
    });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
