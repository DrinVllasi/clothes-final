<?php
session_start();
include 'header.php';
include 'fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="prata-font mb-4">Thank You for Your Order!</h2>
            <div class="alert alert-success mb-4">
                <h4 class="alert-heading">Order Confirmed</h4>
                <p>Your order has been successfully placed. You will receive a confirmation email shortly.</p>
                <hr>
                <p class="mb-0">Payment Method: Cash on Delivery</p>
            </div>
            <a href="firstpage.php" class="btn btn-dark rounded-0 prata-font">Continue Shopping</a>
        </div>
    </div>

    <style>
        .prata-font { font-family: 'Prata', serif; }
        .btn { font-family: 'Prata', serif; }
    </style>

    <?php include 'footer.php'; ?>
</body>
</html> 