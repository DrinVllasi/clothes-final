<?php
include 'fonts.php';
include 'config.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Boots - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="card-styles.css">
    <link rel="stylesheet" href="nav-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="category-title">
        <h2>Men's Boots</h2>
    </div>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Men's Boots 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0">
                    <a href="product-details.php?name=Men's%20Boots&price=129.99&image=clothes/mens/unisex-boots.png" class="product-link">
                        <div class="card-img-container">
                            <img src="clothes/mens/unisex-boots.png" class="card-img-top rounded-0" alt="Men's Boots">
                            <button class="favorite-btn" data-name="Men's Boots" data-price="129.99" data-image="clothes/mens/unisex-boots.png">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Men's Boots</h5>
                            <p class="card-text">$129.99</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <style>
        .card {
            border: 1px solid black;
            cursor: pointer;
        }

        .card-img-container {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
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
            color: #808080;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .favorite-btn.active i {
            color: #ff0000;
        }

        .product-link {
            text-decoration: none;
            color: inherit;
        }

        .product-link:hover {
            text-decoration: none;
            color: inherit;
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

        .category-title {
            text-align: center;
            padding: 40px 0;
        }

        .category-title h2 {
            font-family: 'Prata', serif;
            font-size: 2.5rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .category-title h2 {
                font-size: 2rem;
            }
        }
    </style>

    <script>
        // Add to favorites functionality
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const product = {
                    name: this.dataset.name,
                    price: this.dataset.price,
                    image: this.dataset.image
                };
                
                let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
                const exists = favorites.some(item => item.name === product.name);
                
                if (!exists) {
                    favorites.push(product);
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                    this.classList.add('active');
                } else {
                    favorites = favorites.filter(item => item.name !== product.name);
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                    this.classList.remove('active');
                }
            });

            // Check if item is in favorites on page load
            const product = {
                name: button.dataset.name,
                price: button.dataset.price,
                image: button.dataset.image
            };
            
            let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
            const exists = favorites.some(item => item.name === product.name);
            
            if (exists) {
                button.classList.add('active');
            }
        });
    </script>
</body>
</html> 