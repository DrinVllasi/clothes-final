<?php
include_once 'fonts.php';
?>
<div class="header-container">
    <div class="nav-section">
        <h1 class="logo"><a href="firstpage.php" class="logo-link">Devsun</a></h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:black">Men's</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="mens-hoodie.php">Hoodies</a></li>
                        <li><a class="dropdown-item" href="mens-jeans.php">Jeans</a></li>
                        <li><a class="dropdown-item" href="mens-shirts.php">Shirts</a></li>
                        <li><a class="dropdown-item" href="mens-longsleeves.php">Longsleeves</a></li>
                        <li><a class="dropdown-item" href="mens-buttonups.php">Button Ups</a></li>
                        <li><a class="dropdown-item" href="mens-boots.php">Boots</a></li>
                        <li><a class="dropdown-item" href="mens-shoes.php">Shoes</a></li>
                        <li><a class="dropdown-item" href="mens-jackets.php">Jackets</a></li>
                        <li><a class="dropdown-item" href="mens-accessories.php">Accessories</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:black">Women's</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="womens-hoodie.php">Hoodies</a></li>
                        <li><a class="dropdown-item" href="womens-jeans.php">Jeans</a></li>
                        <li><a class="dropdown-item" href="womens-shirts.php">Shirts</a></li>
                        <li><a class="dropdown-item" href="womens-longsleeves.php">Longsleeves</a></li>
                        <li><a class="dropdown-item" href="womens-shorts.php">Shorts</a></li>
                        <li><a class="dropdown-item" href="womens-skirts.php">Skirts</a></li>
                        <li><a class="dropdown-item" href="womens-boots.php">Boots</a></li>
                        <li><a class="dropdown-item" href="womens-shoes.php">Shoes</a></li>
                        <li><a class="dropdown-item" href="womens-bags.php">Bags</a></li>
                        <li><a class="dropdown-item" href="womens-accessories.php">Accessories</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="unisex.php" style="color:black">Unisex</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="our-story.php" style="color:black">Our story</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-icons">
        <a href="favorites.php" class="icon-link"><img src="models/heart.png" alt="Wishlist" class="nav-icon"></a>
        <a href="cart.php" class="icon-link"><img src="models/online-shopping.png" alt="Cart" class="nav-icon"></a>
        <a href="javascript:void(0)" class="icon-link" id="logout-btn"><img src="models/logout.png" alt="Logout" class="nav-icon"></a>
    </div>
</div>

<style>
.nav-tabs {
    border-bottom: none !important;
}

header {
    width: 100%;
    background: white;
    z-index: 1000;
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
    margin: 0;
}

.logo-link {
    text-decoration: none;
    color: black;
    font-family: "UnifrakturMaguntia", cursive;
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

.header-icons {
    display: flex;
    align-items: center;
    gap: 40px;
    margin-left: auto;
    padding-right: 0;
}

.icon-link {
    text-decoration: none;
    color: black;
    transition: opacity 0.2s;
}

.icon-link:hover {
    opacity: 0.7;
}

.nav-icon {
    width: 24px;
    height: 24px;
    object-fit: contain;
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

@media only screen and (max-width: 768px) {
    .header-container {
        padding: 20px;
        flex-direction: column;
    }

    .nav-section {
        gap: 30px;
        flex-direction: column;
        align-items: center;
    }

    .logo {
        margin: 0;
    }

    .nav-tabs {
        flex-direction: column;
        align-items: center;
    }

    .nav-item {
        margin: 10px 0;
        text-align: center;
    }

    .header-icons {
        padding-right: 0;
        margin: 20px 0;
        justify-content: center;
    }

    .dropdown-menu {
        position: static;
        text-align: center;
    }
}
</style>

<script>
document.getElementById('logout-btn').addEventListener('click', function(e) {
    if (confirm('Are you sure you want to logout?')) {
        // Clear cart data
        localStorage.clear();
        // Redirect to logout page
        window.location.href = 'logout.php';
    }
});
</script> 