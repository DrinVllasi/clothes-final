<?php
include 'header.php';
include 'fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Devsun</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4 prata-font">Shopping Cart</h2>
        
        <div class="cart-container">
            <ul id="cart-items" class="list-group mb-4">
                <!-- Cart items will be dynamically added here -->
            </ul>
            
            <div class="cart-summary">
                <div class="d-flex justify-content-between mb-3">
                    <span class="prata-font">Subtotal:</span>
                    <span id="subtotal" class="prata-font">$0.00</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="prata-font">Shipping:</span>
                    <span id="shipping" class="prata-font">$5.99</span>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <span class="prata-font fw-bold">Total:</span>
                    <span id="total" class="prata-font fw-bold">$0.00</span>
                </div>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-dark btn-lg rounded-0 prata-font" id="checkout-btn">Proceed to Checkout</button>
                    <button class="btn btn-outline-dark rounded-0 prata-font" id="clear-cart-btn">Clear Cart</button>
                </div>
            </div>
        </div>
        
        <div id="empty-cart-message" class="text-center mt-5 d-none">
            <h3 class="prata-font mb-4">Your cart is empty</h3>
            <a href="firstpage.php" class="btn btn-dark rounded-0 prata-font">Continue Shopping</a>
        </div>
    </div>

    <style>
        .nav-tabs {
            border-bottom: none !important;
        }

        body {
            overflow-x: hidden;
            width: 100%;
            min-height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 20px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        li {
            margin-left: 20px;
        }

        a {
            color: black;
            text-decoration: none;
            font-family: 'Prata', serif;
        }

        .shopping-cart {
            width: 35px;
            height: 35px;
            margin-top: -7px;
            margin-right: 80px;
        }

        .logo {
            font-size: 70px;
            font-weight: 400;
            text-align: center;
            margin-left: 50px;
        }

        .logo-link {
            text-decoration: none;
            color: black;
            font-family: "UnifrakturMaguntia", cursive;
        }

        @media only screen and (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
            }

            .logo {
                margin: 10px 0;
            }

            nav {
                margin-top: 20px;
            }

            nav ul {
                flex-direction: column;
                text-align: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            .shopping-cart {
                margin: 10px 0;
            }
        }

        /* Cart specific styles */
        .prata-font {
            font-family: 'Prata', serif;
        }
        
        .cart-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .list-group-item {
            border-left: none;
            border-right: none;
            border-radius: 0 !important;
            padding: 1rem;
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 5px;
        }
        
        .cart-item-details {
            flex-grow: 1;
            padding: 0 1rem;
        }
        
        .cart-summary {
            border-top: 2px solid #000;
            padding-top: 2rem;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-dark:hover {
            background-color: #333;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .quantity-btn {
            background: none;
            border: 1px solid #000;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                text-align: center;
            }
            
            .cart-item-image {
                margin-bottom: 1rem;
            }
            
            .cart-item-details {
                padding: 0;
                margin-bottom: 1rem;
            }
            
            .quantity-control {
                justify-content: center;
                margin-bottom: 1rem;
            }
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            width: 100%;
            max-width: 100%;
        }

        .nav-section {
            display: flex;
            align-items: center;
            gap: 100px;
        }

        .logo {
            font-size: 70px;
            font-weight: 400;
            text-align: center;
            margin-left: 0;
        }

        .header-icons {
            display: flex;
            align-items: center;
            gap: 40px;
            margin-left: auto;
            padding-right: 0;
        }

        @media only screen and (max-width: 768px) {
            .header-container {
                padding: 20px;
                flex-direction: column;
            }

            .nav-section {
                gap: 30px;
                flex-direction: column;
            }

            .logo {
                margin-left: 0;
            }

            .header-icons {
                padding-right: 0;
                margin: 20px 0;
                justify-content: center;
            }
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link, .dropdown-item {
            font-family: 'Prata', serif;
            font-size: 1.2rem;
        }

        .dropdown-item {
            font-size: 1rem;
            padding: 8px 20px;
        }

        .dropdown-item:focus,
        .dropdown-item:active {
            background-color: transparent !important;
            color: #666 !important;
        }

        .dropdown-item:hover {
            background-color: transparent;
            color: #666;
        }

        .nav-link:hover, .dropdown-item:hover {
            color: #666 !important;
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
            animation: fadeIn 0.2s ease-in-out;
        }

        .dropdown-menu {
            border-radius: 0;
            border: 1px solid black;
            background-color: white;
            min-width: 200px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-link.dropdown-toggle::after {
            transition: transform 0.2s ease;
        }

        .nav-item.dropdown:hover .dropdown-toggle::after {
            transform: rotate(180deg);
        }
    </style>

    <script>
        // Initialize cart as soon as possible
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const cartList = document.getElementById('cart-items');
        const emptyCartMessage = document.getElementById('empty-cart-message');
        const cartContainer = document.querySelector('.cart-container');
        const subtotalElement = document.getElementById('subtotal');
        const totalElement = document.getElementById('total');
        
        function updateCart() {
            cartList.innerHTML = ''; // Clear existing items
            
            if (!cartItems || cartItems.length === 0) {
                cartContainer.style.display = 'none';
                emptyCartMessage.classList.remove('d-none');
                return;
            }
            
            cartContainer.style.display = 'block';
            emptyCartMessage.classList.add('d-none');
            
            let subtotal = 0;
            
            cartItems.forEach((item, index) => {
                const itemTotal = parseFloat(item.price) * item.quantity;
                subtotal += itemTotal;
                
                // Debug the image path
                console.log('Original image path:', item.image);
                
                // Ensure the image path is correct
                let imagePath = item.image;
                // If the path doesn't include /unisex/, /mens/, or /womens/, add the appropriate category
                if (!imagePath.includes('/unisex/') && !imagePath.includes('/mens/') && !imagePath.includes('/womens/')) {
                    // Determine category from the filename
                    if (imagePath.includes('unisex-')) {
                        imagePath = imagePath.replace('clothes/', 'clothes/unisex/');
                    } else if (imagePath.includes('men-')) {
                        imagePath = imagePath.replace('clothes/', 'clothes/mens/');
                    } else if (imagePath.includes('women-')) {
                        imagePath = imagePath.replace('clothes/', 'clothes/womens/');
                    }
                }
                
                console.log('Adjusted image path:', imagePath);
                
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.innerHTML = `
                    <div class="cart-item">
                        <div class="cart-item-image-container">
                            <img src="${imagePath}" alt="${item.name}" class="cart-item-image" onerror="this.onerror=null; console.log('Failed to load image:', this.src);">
                        </div>
                        <div class="cart-item-details">
                            <h5 class="prata-font">${item.name}</h5>
                            <p class="mb-1">Size: ${item.size}</p>
                            <p class="mb-1">Price: $${parseFloat(item.price).toFixed(2)}</p>
                            <p class="mb-2">Total: $${itemTotal.toFixed(2)}</p>
                            <div class="quantity-control">
                                <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                                <span>${item.quantity}</span>
                                <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                            </div>
                        </div>
                        <button class="btn btn-link text-danger" onclick="removeItem(${index})">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                `;
                cartList.appendChild(listItem);
                
                // Debug: Check if the image exists
                const img = new Image();
                img.onload = () => console.log('Image loaded successfully:', imagePath);
                img.onerror = () => console.log('Image failed to load:', imagePath);
                img.src = imagePath;
            });
            
            const shipping = cartItems.length > 0 ? 5.99 : 0;
            const total = subtotal + shipping;
            
            subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
            totalElement.textContent = `$${total.toFixed(2)}`;
            
            // Debug: Log all cart items
            console.log('Current cart items:', cartItems);
        }
        
        function updateQuantity(index, change) {
            if (cartItems[index].quantity + change > 0) {
                cartItems[index].quantity += change;
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                updateCart();
            }
        }
        
        function removeItem(index) {
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCart();
        }
        
        const clearCartBtn = document.getElementById('clear-cart-btn');
        clearCartBtn.addEventListener('click', function() {
            cartItems = [];
            localStorage.removeItem('cartItems');
            updateCart();
        });
        
        const checkoutBtn = document.getElementById('checkout-btn');
        checkoutBtn.addEventListener('click', function() {
            alert('Checkout functionality will be implemented soon!');
        });
        
        // Call updateCart immediately when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateCart();
        });

        // Update cart when storage changes (in case of multiple tabs)
        window.addEventListener('storage', function(e) {
            if (e.key === 'cartItems') {
                cartItems = JSON.parse(e.newValue || '[]');
                updateCart();
            }
        });

        function adjustBodyHeight() {
            document.body.style.height = window.innerHeight + "px";
        }

        window.onload = adjustBodyHeight;
        window.onresize = adjustBodyHeight;
    </script>

    <?php include 'footer.php'; ?>
    
</body>
</html>
