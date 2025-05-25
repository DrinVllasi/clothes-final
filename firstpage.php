<?php 
include 'header.php';
include 'fonts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS (dropdowns need this) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome for heart icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title> Devsun</title>
</head>
<body>  
    
    

<div class="container-fluid p-0">
  <div class="row g-0">
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/unisex-jorts.jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Unisex Jorts" data-price="34.99" data-image="clothes/unisex-jorts.jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Unisex Jorts</h5>
          <p class="card-text">$34.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Unisex Jorts" 
            data-price="34.99" 
            data-image="clothes/unisex-jorts.jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/men-hoodie (6).jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Men's Hoodie" data-price="49.99" data-image="clothes/men-hoodie (6).jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Men's Hoodie</h5>
          <p class="card-text">$49.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Men's Hoodie" 
            data-price="49.99" 
            data-image="clothes/men-hoodie (6).jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/men-longsleeve.jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Men's Longsleeve" data-price="29.99" data-image="clothes/men-longsleeve.jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Men's Longsleeve</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Men's Longsleeve" 
            data-price="29.99" 
            data-image="clothes/men-longsleeve.jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/women-bootcut.JPG" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Women's Bootcut" data-price="39.99" data-image="clothes/women-bootcut.JPG">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Women's Bootcut</h5>
          <p class="card-text">$39.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Women's Bootcut" 
            data-price="39.99" 
            data-image="clothes/women-bootcut.JPG">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/women-shirt (7).JPG" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Women's Shirt" data-price="29.99" data-image="clothes/women-shirt (7).JPG">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Women's Shirt</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Women's Shirt" 
            data-price="29.99" 
            data-image="clothes/women-shirt (7).JPG">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/women-skirt.jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Women's Skirt" data-price="29.99" data-image="clothes/women-skirt.jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Women's Skirt</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Women's Skirt" 
            data-price="29.99" 
            data-image="clothes/women-skirt.jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/men-shirt (5).JPG" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Men's Shirt" data-price="29.99" data-image="clothes/men-shirt (5).JPG">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Men's Shirt</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Men's Shirt" 
            data-price="29.99" 
            data-image="clothes/men-shirt (5).JPG">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/unisex-baggy (2).jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Unisex Baggy" data-price="29.99" data-image="clothes/unisex-baggy (2).jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Unisex Baggy</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Unisex Baggy" 
            data-price="29.99" 
            data-image="clothes/unisex-baggy (2).jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/unisex-dirtywashed-baggyjeans-1.jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Unisex Dirtywashed Baggy" data-price="29.99" data-image="clothes/unisex-dirtywashed-baggyjeans-1.jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Unisex Dirtywashed Baggy</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Unisex Dirtywashed Baggy" 
            data-price="29.99" 
            data-image="clothes/unisex-dirtywashed-baggyjeans-1.jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/women-flares.jpg" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Women's Flares" data-price="29.99" data-image="clothes/women-flares.jpg">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Women's Flares</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Women's Flares" 
            data-price="29.99" 
            data-image="clothes/women-flares.jpg">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/unisex-shirt.JPG" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Unisex Shirt" data-price="29.99" data-image="clothes/unisex-shirt.JPG">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Unisex Shirt</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Unisex Shirt" 
            data-price="29.99" 
            data-image="clothes/unisex-shirt.JPG">
            Add to Cart
          </button>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4 col-lg-3">
      <div class="card rounded-0">
        <div class="card-img-container">
          <img src="clothes/men-baggy (2).png" class="card-img-top rounded-0" alt="...">
          <button class="favorite-btn" data-name="Men's Baggy" data-price="29.99" data-image="clothes/men-baggy (2).png">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <div class="card-body text-center">
          <h5 class="card-title">Men's Baggy</h5>
          <p class="card-text">$29.99</p>
          <button class="btn btn-dark rounded-0 add-to-cart" 
            data-name="Men's Baggy" 
            data-price="29.99" 
            data-image="clothes/men-baggy (2).png">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="divider">
  <div class="divider-element"></div>
  <div class="divider-text">devsun</div>
  <div class="divider-element"></div>
</div>

<!-- New row with 3 larger cards -->
<div class="container-fluid p-0 large-cards-section">
  <div class="row g-0">
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
      <div class="card rounded-0 large-card">
        <a href="jorts.php">
          <img src="models/model1.png" class="card-img-top rounded-0" alt="...">
        </a>
      </div>
    </div>

    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
      <div class="card rounded-0 large-card">
        <a href="jorts.php">
          <img src="models/model2.png" class="card-img-top rounded-0" alt="...">
        </a>
      </div>
    </div>

    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
      <div class="card rounded-0 large-card">
        <a href="jorts.php">
          <img src="models/model3.png" class="card-img-top rounded-0" alt="...">
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Centered button section -->
<div class="text-center mt-2 mb-4">
  <a href="jorts.php" class="btn btn-dark btn-lg px-5 py-3 rounded-0 prata-font">Like what you see? Check out more Jorts!</a>
</div>

</body>
</html>

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

        li{
            margin-left: 20px;
        }

        a {
            color: black;
            text-decoration: none;
            font-family:'Prata', serif;
        }

        .shopping-cart{
            width: 35px;
            height: 35px;
            margin-top: -7px;
            margin-right: 80px;
        }
        .logo{
            font-size: 70px;
            font-weight: 400;
            text-align: center;
            margin-left: 50px;
          
        }
        .logo-link{
            text-decoration: none;
            color: black; 
            font-family: "UnifrakturMaguntia", cursive;
        }
        .first-page-text{
            margin-left: 5%;
            padding-bottom: 0%;
        }
        .shop-btn{
            padding: 15px;
            background-color: black;
            border-radius: 10px;
            border-style: none;
            box-shadow: 2px 5px 15px #888888
        }
        .shop-link{
            color: white;
        }
        .quote {
            font-family: 'Roboto';
            font-size: 50px;
            letter-spacing: 2px;
            font-weight: 400;
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
        
.card {
    border: 1px solid black;
    cursor: pointer;
}

.card-img-top {
    aspect-ratio: 1;
    object-fit: fit;
}

.card-body {
    padding: 1rem;
}

.card-title {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    font-family: 'Prata', serif;
}

.card-text {
    font-weight: bold;
    color: #333;
    font-family: 'Prata', serif;
}

@media (max-width: 768px) {
    .card-body {
        padding: 0.75rem;
    }
}

/* Styles for the larger cards */
.large-cards-section {
    margin-top: 6rem;
    margin-bottom: 2rem;
}

.large-card {
    height: 900px;
    margin-bottom: 2rem;
}

.large-card .card-img-top {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.large-card .card-body {
    padding: 2rem;
}

.large-card .card-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.large-card .btn {
    margin-top: 1rem;
    padding: 0.5rem 2rem;
}

.btn-lg {
    font-family: 'Prata', serif;
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.btn-lg:hover {
    transform: scale(1.05);
}

hr {
    border: none;
    height: 1px;
    background-color: black;
    width: 100%;
    margin-left: 0;
    margin-right: 0;
}

.divider {
    margin: 5rem 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3rem;
    padding: 0 10%;
    position: relative;
}

.divider-element {
    height: 3px;
    background: repeating-linear-gradient(90deg, black, black 15px, transparent 15px, transparent 20px);
    flex-grow: 1;
    position: relative;
}

.divider-text {
    font-family: "UnifrakturMaguntia", cursive;
    font-size: 3rem;
    padding: 0 2rem;
    position: relative;
}

.divider-text::before,
.divider-text::after {
    content: '×';
    position: absolute;
    font-size: 2rem;
    top: 50%;
    transform: translateY(-50%);
    color: black;
}

.divider-text::before {
    left: 0;
}

.divider-text::after {
    right: 0;
}

@media (max-width: 768px) {
    .divider {
        gap: 1.5rem;
        padding: 0 5%;
    }
    .divider-text {
        font-size: 2.5rem;
    }
}

@media (max-width: 576px) {
    .divider {
        gap: 1rem;
    }
    .divider-text {
        font-size: 2rem;
        padding: 0 1rem;
    }
    .divider-element {
        height: 2px;
        background: repeating-linear-gradient(90deg, black, black 10px, transparent 10px, transparent 15px);
    }
}

.large-card a {
    display: block;
    height: 100%;
}

.large-card a:hover img {
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.prata-font {
    font-family: 'Prata', serif;
}

.header-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 20px 50px;
    width: 100%;
    gap: 150px;
}

.logo {
    font-size: 70px;
    font-weight: 400;
    margin: 0;
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

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        padding: 20px;
        gap: 20px;
    }
    
    .nav-item {
        margin-left: 15px;
    }
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

.add-to-cart {
    font-family: 'Prata', serif;
    font-size: 0.9rem;
    padding: 8px 20px;
    transition: all 0.3s ease;
}

.add-to-cart:hover {
    background-color: #333;
    transform: translateY(-2px);
}

.card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.card-text {
    margin-bottom: 0;
}

.card-img-container {
    position: relative;
}

.favorite-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.8);
    border: none;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 1;
}

.favorite-btn:hover {
    background: rgba(255, 255, 255, 1);
    transform: scale(1.1);
}

.favorite-btn i {
    font-size: 18px;
    color: #666;
    transition: all 0.3s ease;
}

.favorite-btn.active i {
    color: #ff0000;
}

/* Remove the old icon styles */
.favorite-btn i::before {
    font-family: "Font Awesome 6 Free";
}

.favorite-btn:not(.active) i {
    font-weight: 400;
}

.favorite-btn.active i {
    font-weight: 900;
    color: #ff0000;
}
</style>

<script>
    function adjustBodyHeight() {
    document.body.style.height = window.innerHeight + "px";
}

window.onload = adjustBodyHeight;
window.onresize = adjustBodyHeight;

// Add to cart functionality
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const price = parseFloat(this.getAttribute('data-price'));
            const image = this.getAttribute('data-image');
            
            // Get existing cart items or initialize empty array
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            
            // Check if item already exists in cart
            const existingItem = cartItems.find(item => item.name === name);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({
                    name: name,
                    price: price,
                    image: image,
                    quantity: 1
                });
            }
            
            // Save updated cart back to localStorage
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            
            // Show success message
            const button = this;
            button.textContent = 'Added!';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = 'Add to Cart';
                button.disabled = false;
            }, 1500);
        });
    });
});

// Favorites functionality
document.addEventListener('DOMContentLoaded', function() {
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    // Load existing favorites
    let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    
    // Update button states based on favorites
    function updateFavoriteButtons() {
        favoriteButtons.forEach(button => {
            const name = button.getAttribute('data-name');
            const isFavorite = favorites.some(item => item.name === name);
            button.classList.toggle('active', isFavorite);
        });
    }
    
    // Initialize button states
    updateFavoriteButtons();
    
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const name = this.getAttribute('data-name');
            const price = parseFloat(this.getAttribute('data-price'));
            const image = this.getAttribute('data-image');
            
            const index = favorites.findIndex(item => item.name === name);
            
            if (index === -1) {
                // Add to favorites
                favorites.push({
                    name: name,
                    price: price,
                    image: image
                });
                this.classList.add('active');
            } else {
                // Remove from favorites
                favorites.splice(index, 1);
                this.classList.remove('active');
            }
            
            // Save to localStorage
            localStorage.setItem('favorites', JSON.stringify(favorites));
            
            // Show feedback
            const icon = this.querySelector('i');
            icon.style.transform = 'scale(1.2)';
            setTimeout(() => {
                icon.style.transform = 'scale(1)';
            }, 200);
        });
    });
});
</script>