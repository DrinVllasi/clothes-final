<?php
include 'fonts.php';
?>

<footer class="footer mt-5">
    <div class="container-fluid p-0">
        <div class="footer-content">
            <div class="row g-0">
                <div class="col-md-3 footer-section">
                    <h3 class="prata-font">About Devsun</h3>
                    <p>Discover the perfect blend of style and comfort with our curated collection of contemporary fashion.</p>
                </div>
                
                <div class="col-md-3 footer-section">
                    <h3 class="prata-font">Men's Collection</h3>
                    <ul class="footer-links">
                        <li><a href="mens-hoodie.php">Men's Hoodies</a></li>
                        <li><a href="mens-accessories.php">Men's Accessories</a></li>
                        <li><a href="mens-boots.php">Men's Boots</a></li>
                        <li><a href="mens-buttonups.php">Men's Button-ups</a></li>
                        <li><a href="mens-jackets.php">Men's Jackets</a></li>
                        <li><a href="mens-jeans.php">Men's Jeans</a></li>
                        <li><a href="mens-longsleeves.php">Men's Longsleeves</a></li>
                        <li><a href="mens-shirts.php">Men's Shirts</a></li>
                        <li><a href="mens-shoes.php">Men's Shoes</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-section">
                    <h3 class="prata-font">Women's Collection</h3>
                    <ul class="footer-links">
                        <li><a href="womens-accessories.php">Women's Accessories</a></li>
                        <li><a href="womens-bags.php">Women's Bags</a></li>
                        <li><a href="womens-boots.php">Women's Boots</a></li>
                        <li><a href="womens-hoodie.php">Women's Hoodies</a></li>
                        <li><a href="womens-jeans.php">Women's Jeans</a></li>
                        <li><a href="womens-longsleeves.php">Women's Longsleeves</a></li>
                        <li><a href="womens-shirts.php">Women's Shirts</a></li>
                        <li><a href="womens-shoes.php">Women's Shoes</a></li>
                        <li><a href="womens-shorts.php">Women's Shorts</a></li>
                        <li><a href="womens-skirts.php">Women's Skirts</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-section">
                    <h3 class="prata-font"><a href="unisex.php" class="prata-font link">Unisex Collection</a></h3>
                    <ul class="footer-links">

                    </ul>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="row g-0">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 Devsun. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer {
    background-color: #222;
    color: #fff;
    margin-top: 6rem;
    font-family: 'Prata', serif;
}

.footer-content {
    padding: 4rem 2rem;
}

.footer-section {
    padding: 0 2rem;
    margin-bottom: 2rem;
}

.footer-section h3 {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #fff;
}
.link {
    color: #fff;
    text-decoration: none;
}

.footer-section p {
    color: #ccc;
    line-height: 1.6;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.3s ease;
    font-size: 0.9rem;
}

.footer-links a:hover {
    color: #fff;
}

.footer-bottom {
    background-color: #2a2a2a;
    padding: 1.5rem;
    color: #999;
}
.prata-font {
    font-family: 'Prata', serif;
}
@media (max-width: 768px) {
    .footer-section {
        text-align: center;
        padding: 0 1rem;
    }
    
    .footer-content {
        padding: 3rem 1rem;
    }
}
</style> 