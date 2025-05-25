   <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
include 'header.php';
include 'fonts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Product Details - Devsun</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Product Image (Left Half) -->
            <div class="col-md-6 p-0">
                <div class="product-image">
                    <img id="productImage" src="" alt="Product Image" class="img-fluid product-img">
                    <button class="favorite-btn" id="favoriteBtn">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
            
            <!-- Product Details (Right Half) -->
            <div class="col-md-6 borderless product-details">
                <div class="details-container">
                    <h1 id="productName" class="prata-font"></h1>
                    <p id="productPrice" class="price prata-font"></p>
                    
                    <!-- Size Selection -->
                    <div class="size-selection mb-4">
                        <h3 class="prata-font mb-3">Select Size</h3>
                        <div class="btn-group size-buttons" role="group">
                            <button type="button" class="btn btn-outline-dark size-btn">XS</button>
                            <button type="button" class="btn btn-outline-dark size-btn">S</button>
                            <button type="button" class="btn btn-outline-dark size-btn">M</button>
                            <button type="button" class="btn btn-outline-dark size-btn">L</button>
                            <button type="button" class="btn btn-outline-dark size-btn">XL</button>
                        </div>
                    </div>
                    
                    <!-- Add to Cart Button -->
                    <button class="btn btn-dark btn-lg w-100 add-to-cart prata-font" disabled>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>

</body>
</html>

<style>
.col-md-6 {
    border: 1px solid black;
}
.borderless{
    border: none;
}
.product-image {
    position: relative;
    height: 100vh;
}

.product-img {
    width: 100%;
    height: 100%;
    object-fit: fit;
}

.product-details {
    display: flex;
    align-items: center;
    padding: 2rem;
}

.details-container {
    max-width: 500px;
    margin: 0 auto;
}

.favorite-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.8);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.favorite-btn:hover {
    background: rgba(255, 255, 255, 1);
    transform: scale(1.1);
}

.favorite-btn i {
    font-size: 20px;
    color: #666;
    transition: all 0.3s ease;
}

.favorite-btn.active i {
    color: #ff0000;
}

.price {
    font-size: 1.5rem;
    font-weight: bold;
    margin: 1rem 0;
}

.size-buttons {
    display: flex;
    gap: 10px;
}

.size-btn {
    padding: 10px 20px;
    font-family: 'Prata', serif;
}

.size-btn.active {
    background-color: black;
    color: white;
}

.add-to-cart {
    margin-top: 2rem;
    padding: 15px;
    font-size: 1.2rem;
}

.add-to-cart:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
.prata-font {
    font-family: 'Prata', serif;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get product details from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('name');
    const productPrice = urlParams.get('price');
    const productImage = urlParams.get('image');
    
    // Set product details
    document.getElementById('productName').textContent = productName;
    document.getElementById('productPrice').textContent = `$${productPrice}`;
    document.getElementById('productImage').src = productImage;
    
    // Size selection
    const sizeButtons = document.querySelectorAll('.size-btn');
    const addToCartButton = document.querySelector('.add-to-cart');
    
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            sizeButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            // Enable add to cart button
            addToCartButton.disabled = false;
        });
    });
    
    // Add to cart functionality
    addToCartButton.addEventListener('click', function() {
        const selectedSize = document.querySelector('.size-btn.active').textContent;
        
        // Get existing cart items or initialize empty array
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        
        // Create unique identifier for product+size combination
        const itemId = `${productName}-${selectedSize}`;
        
        // Check if item with same size already exists in cart
        const existingItem = cartItems.find(item => 
            item.name === productName && item.size === selectedSize
        );
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cartItems.push({
                name: productName,
                price: parseFloat(productPrice),
                image: productImage,
                size: selectedSize,
                quantity: 1
            });
        }
        
        // Save updated cart back to localStorage
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        
        // Show success message
        addToCartButton.textContent = 'Added to Cart!';
        addToCartButton.disabled = true;
        
        setTimeout(() => {
            addToCartButton.textContent = 'Add to Cart';
            addToCartButton.disabled = false;
        }, 1500);
    });
    
    // Favorites functionality
    const favoriteBtn = document.getElementById('favoriteBtn');
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    
    // Check if product is already in favorites
    const isFavorite = favorites.some(item => item.name === productName);
    if (isFavorite) {
        favoriteBtn.classList.add('active');
    }
    
    favoriteBtn.addEventListener('click', function() {
        const index = favorites.findIndex(item => item.name === productName);
        
        if (index === -1) {
            // Add to favorites
            favorites.push({
                name: productName,
                price: parseFloat(productPrice),
                image: productImage
            });
            this.classList.add('active');
        } else {
            // Remove from favorites
            favorites.splice(index, 1);
            this.classList.remove('active');
        }
        
        // Save to localStorage
        localStorage.setItem('favorites', JSON.stringify(favorites));
    });
});
</script>
</html> 