<?php
include 'fonts.php';
include 'config.php';
include 'header.php';

// Dynamically get all shorts and jorts images
$shorts_images = array_merge(
    glob('clothes/womens/*shorts*.png'),
    glob('clothes/womens/*jorts*.png'),
    glob('clothes/womens/unisex-shorts*.png'),
    glob('clothes/womens/unisex-jorts*.png')
);
$shorts_images = array_unique($shorts_images);

function makeProductName($filename) {
    $name = basename($filename, '.png');
    $name = str_replace(['-', '_'], ' ', $name);
    $name = preg_replace('/\s+/', ' ', $name);
    $name = ucwords($name);
    return $name;
}

// Group images by type
$regular_shorts = array_filter($shorts_images, function($img) { 
    return stripos($img, 'jorts') === false; 
});
$jorts = array_filter($shorts_images, function($img) { 
    return stripos($img, 'jorts') !== false; 
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Shorts - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="card-styles.css">
    <link rel="stylesheet" href="nav-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="category-title">
        <h2>Women's Shorts</h2>
    </div>

    <div class="container-fluid p-0">
        <!-- Regular Shorts Section -->
        <div class="section-title">
            <h3>Regular Shorts</h3>
        </div>
        <div class="row g-0">
            <?php foreach ($regular_shorts as $img): 
                $productName = makeProductName($img);
                $price = '29.99';
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0">
                    <a href="product-details.php?name=<?=urlencode($productName)?>&price=<?=$price?>&image=<?=$img?>" class="product-link">
                        <div class="card-img-container">
                            <img src="<?=$img?>" class="card-img-top rounded-0" alt="<?=$productName?>">
                            <button class="favorite-btn" data-name="<?=$productName?>" data-price="<?=$price?>" data-image="<?=$img?>">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?=$productName?></h5>
                            <p class="card-text">$<?=$price?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Jorts Section -->
        <div class="section-title">
            <h3>Jorts</h3>
        </div>
        <div class="row g-0">
            <?php foreach ($jorts as $img): 
                $productName = makeProductName($img);
                $price = '34.99';
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card rounded-0">
                    <a href="product-details.php?name=<?=urlencode($productName)?>&price=<?=$price?>&image=<?=$img?>" class="product-link">
                        <div class="card-img-container">
                            <img src="<?=$img?>" class="card-img-top rounded-0" alt="<?=$productName?>">
                            <button class="favorite-btn" data-name="<?=$productName?>" data-price="<?=$price?>" data-image="<?=$img?>">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?=$productName?></h5>
                            <p class="card-text">$<?=$price?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
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
.section-title {
    text-align: center;
    padding: 20px 0;
}
.section-title h3 {
    font-family: 'Prata', serif;
    font-size: 1.8rem;
    margin: 0;
}
        @media (max-width: 768px) {
    .category-title h2 {
        font-size: 2rem;
    }
    .section-title h3 {
        font-size: 1.5rem;
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