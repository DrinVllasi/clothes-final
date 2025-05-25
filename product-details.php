<?php
include 'fonts.php';
include 'config.php';
include 'header.php';

// Get product details from URL parameters
$productName = $_GET['name'] ?? '';
$productPrice = $_GET['price'] ?? '';
$productImage = $_GET['image'] ?? '';

// Get the category from the image path
$category = '';
if (strpos($productImage, 'men-') !== false) {
    $category = 'men';
} else if (strpos($productImage, 'women-') !== false) {
    $category = 'women';
} else if (strpos($productImage, 'unisex-') !== false) {
    $category = 'unisex';
}

// Define all available products by category
$allProducts = [
    'men' => [
        ['name' => "Men's Slim Jeans", 'price' => '39.99', 'image' => 'clothes/mens/men-slim.png'],
        ['name' => "Men's Straight Jeans", 'price' => '39.99', 'image' => 'clothes/mens/men-straight.png'],
        ['name' => "Men's Baggy Jeans", 'price' => '44.99', 'image' => 'clothes/mens/men-baggy.png'],
        ['name' => "Men's Goth Baggy Jeans", 'price' => '49.99', 'image' => 'clothes/mens/men-goth-baggyjeans-1.png'],
        ['name' => "Men's Cargo Baggy Jeans", 'price' => '54.99', 'image' => 'clothes/mens/mens-cargo-baggyjeans-1.png'],
        ['name' => "Men's Button Up", 'price' => '34.99', 'image' => 'clothes/mens/men-buttonup.png'],
        ['name' => "Men's Hoodie", 'price' => '49.99', 'image' => 'clothes/mens/men-hoodie.png'],
        ['name' => "Men's Longsleeve", 'price' => '29.99', 'image' => 'clothes/mens/men-longsleeve.png'],
        ['name' => "Men's Shirt", 'price' => '24.99', 'image' => 'clothes/mens/men-shirt.png']
    ],
    'women' => [
        ['name' => "Women's Bootcut Jeans", 'price' => '39.99', 'image' => 'clothes/womens/women-bootcut.png'],
        ['name' => "Women's Flare Jeans", 'price' => '44.99', 'image' => 'clothes/womens/women-flare.png'],
        ['name' => "Women's Baggy Jeans", 'price' => '44.99', 'image' => 'clothes/womens/women-baggy.png'],
        ['name' => "Women's Shorts", 'price' => '34.99', 'image' => 'clothes/womens/women-shorts.png'],
        ['name' => "Women's Skirt", 'price' => '39.99', 'image' => 'clothes/womens/women-skirt.png'],
        ['name' => "Women's Hoodie", 'price' => '49.99', 'image' => 'clothes/womens/women-hoodie.png'],
        ['name' => "Women's Shirt", 'price' => '24.99', 'image' => 'clothes/womens/women-shirt.png'],
        ['name' => "Women's Longsleeve", 'price' => '29.99', 'image' => 'clothes/womens/women-longsleeve.png']
    ],
    'unisex' => [
        ['name' => "Unisex Baggy Jeans", 'price' => '44.99', 'image' => 'clothes/mens/unisex-baggy.png'],
        ['name' => "Unisex Dirtywashed Baggy Jeans", 'price' => '49.99', 'image' => 'clothes/mens/unisex-dirtywashed-baggyjeans-1.png'],
        ['name' => "Unisex Jorts", 'price' => '34.99', 'image' => 'clothes/mens/unisex-jorts.png'],
        ['name' => "Unisex Hoodie", 'price' => '49.99', 'image' => 'clothes/mens/unisex-hoodie.png'],
        ['name' => "Unisex Shirt", 'price' => '24.99', 'image' => 'clothes/mens/unisex-shirt.png'],
        ['name' => "Unisex Longsleeve", 'price' => '29.99', 'image' => 'clothes/mens/unisex-longsleeve.png']
    ]
];

// Get suggestions for the current category
$suggestions = [];
if ($category && isset($allProducts[$category])) {
    $categoryProducts = $allProducts[$category];
    // Filter out the current product
    $categoryProducts = array_filter($categoryProducts, function($product) use ($productName) {
        return $product['name'] !== $productName;
    });
    // Randomly select 3 products
    $keys = array_rand($categoryProducts, min(3, count($categoryProducts)));
    if (!is_array($keys)) {
        $keys = [$keys];
    }
    foreach ($keys as $key) {
        $suggestions[] = $categoryProducts[$key];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($productName); ?> - Devsun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($productImage); ?>" class="img-fluid product-image" alt="<?php echo htmlspecialchars($productName); ?>" />
            </div>
            <div class="col-md-6">
                <h1 class="product-title"><?php echo htmlspecialchars($productName); ?></h1>
                <p class="product-price">$<?php echo htmlspecialchars($productPrice); ?></p>
                <div class="size-selector mb-4">
                    <h4>Select Size:</h4>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="size" id="size-xs" autocomplete="off" />
                        <label class="btn btn-outline-dark rounded-0" for="size-xs">XS</label>

                        <input type="radio" class="btn-check" name="size" id="size-s" autocomplete="off" />
                        <label class="btn btn-outline-dark rounded-0" for="size-s">S</label>

                        <input type="radio" class="btn-check" name="size" id="size-m" autocomplete="off" />
                        <label class="btn btn-outline-dark rounded-0" for="size-m">M</label>

                        <input type="radio" class="btn-check" name="size" id="size-l" autocomplete="off" />
                        <label class="btn btn-outline-dark rounded-0" for="size-l">L</label>

                        <input type="radio" class="btn-check" name="size" id="size-xl" autocomplete="off" />
                        <label class="btn btn-outline-dark rounded-0" for="size-xl">XL</label>
                    </div>
                </div>
                <button class="btn btn-dark rounded-0 w-100 mb-3 prata-font" id="addToCartBtn"
                        data-name="<?php echo htmlspecialchars($productName); ?>"
                        data-price="<?php echo htmlspecialchars($productPrice); ?>"
                        data-image="<?php echo htmlspecialchars($productImage); ?>">
                    Add to Cart
                </button>
                
            </div>
        </div>

        <!-- Chatbot container with example buttons -->
        <div id="chatbot" style="margin-top: 40px;">
            <h3>Type the type of clothing you're looking for. <br> For example: men's jeans.
        </h3>
            <input type="text" id="userMessage" placeholder="Type your message here" style="width: 70%; padding: 8px;" />
            <button id="sendBtn" style="padding: 8px 16px;">Send</button>

            <!-- Example buttons for quick queries -->
            <div id="exampleButtons" style="margin-top: 15px; display: flex; gap: 10px; flex-wrap: wrap;">
                <button class="btn btn-sm btn-outline-primary example-btn">Show me men's hoodies</button>
                <button class="btn btn-sm btn-outline-primary example-btn">Suggest unisex baggy pants</button>
            </div>

            <div id="chatbotResponse" style="margin-top: 20px;"></div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Handle example buttons to autofill input and send message
        document.querySelectorAll('.example-btn').forEach(button => {
            button.addEventListener('click', () => {
                const userMessageInput = document.getElementById('userMessage');
                userMessageInput.value = button.textContent;
                userMessageInput.focus();

                // Trigger the send button click programmatically
                document.getElementById('sendBtn').click();
            });
        });

        // Chatbot send button logic (your existing code)
        document.getElementById('sendBtn').addEventListener('click', function () {
            const messageInput = document.getElementById('userMessage');
            const message = messageInput.value.trim();
            if (!message) return;

            const responseDiv = document.getElementById('chatbotResponse');
            responseDiv.innerHTML = 'Loading...';

            fetch('chatbot_api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: message }),
            })
                .then(res => res.json())
                .then(data => {
                    let html = `<p><strong>Bot:</strong> ${data.response}</p>`;

                    if (data.images && data.images.length > 0) {
                        html += '<div class="row g-4 mt-3">';
                        data.images.forEach(imgUrl => {
                            html += `
                                <div class="col-4">
                                    <div class="favorite-card">
                                        <div class="card-img-container">
                                            <img src="${imgUrl}" alt="Suggestion" class="card-img-top">
                                        </div>
                                    </div>
                                </div>`;
                        });
                        html += '</div>';
                    }

                    responseDiv.innerHTML = html;
                })
                .catch(() => {
                    responseDiv.innerHTML = '<p style="color:red;">Error communicating with chatbot.</p>';
                });

            messageInput.value = '';
            messageInput.focus();
        });

        // Add to Cart button logic
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            const btn = this;
            const size = document.querySelector('input[name="size"]:checked');
            if (!size) {
                alert('Please select a size');
                return;
            }

            const data = {
                name: btn.getAttribute('data-name'),
                price: btn.getAttribute('data-price'),
                image: btn.getAttribute('data-image'),
                size: size.nextElementSibling.textContent
            };

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    btn.textContent = 'Added to cart';
                    setTimeout(() => {
                        btn.textContent = 'Add to Cart';
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

    <style>
        .product-image {
            max-height: 600px;
            width: 100%;
            object-fit: contain;
        }

        .product-title {
            font-family: 'Prata', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .product-price {
            font-family: 'Prata', serif;
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .size-selector h4 {
            font-family: 'Prata', serif;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .btn-group {
            gap: 5px;
        }

        .add-to-cart, .favorite-btn {
            font-family: 'Prata', serif;
            font-weight: 600;
        }

        #chatbot {
            font-family: 'Prata', serif;
        }

        /* Card styles for chatbot suggestions */
        .favorite-card {
            border: 1px solid black;
            transition: all 0.3s ease;
        }

        .favorite-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card-img-container {
            position: relative;
            padding-top: 100%;
        }

        .card-img-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>

</body>
</html>
