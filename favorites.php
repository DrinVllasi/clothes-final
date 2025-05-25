<?php 
// Bootstrap imports need to be before header include to ensure consistent styling
?>
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
    <title>Favorites - Devsun</title>
    <style>
        /* Dropdown styling fixes */
        .dropdown-menu {
            padding: 8px 0;
        }
        .dropdown-item {
            padding: 8px 20px;
            margin: 2px 0;
            font-family: 'Prata', serif !important;
            font-size: 1rem !important;
        }
        .nav-item {
            margin-right: 10px !important;
            margin-left: 20px !important;
        }
        .nav-item:last-child {
            margin-right: 0 !important;
        }
        .nav-link {
            font-family: 'Prata', serif !important;
            font-size: 1.2rem !important;
        }

        /* Original favorites styles */
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
            object-fit: cover;
        }

        .remove-favorite {
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

        .remove-favorite:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .remove-favorite i {
            color: #ff0000;
            font-size: 18px;
        }

        .prata-font {
            font-family: 'Prata', serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4 prata-font">My Favorites</h1>
        <div id="favorites-container" class="row g-4">
            <!-- Favorites will be loaded here dynamically -->
        </div>
        <div id="no-favorites" class="text-center mt-5" style="display: none;">
            <h3 class="prata-font">No favorites yet</h3>
            <p class="mt-3">Start adding items to your favorites by clicking the heart icon on products!</p>
            <a href="firstpage.php" class="btn btn-dark rounded-0 mt-3 prata-font">Browse Products</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoritesContainer = document.getElementById('favorites-container');
            const noFavoritesMessage = document.getElementById('no-favorites');
            
            function loadFavorites() {
                const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
                favoritesContainer.innerHTML = '';
                
                if (favorites.length === 0) {
                    noFavoritesMessage.style.display = 'block';
                    return;
                }
                
                noFavoritesMessage.style.display = 'none';
                
                favorites.forEach(item => {
                    const favoriteCard = document.createElement('div');
                    favoriteCard.className = 'col-6 col-md-4 col-lg-3';
                    favoriteCard.innerHTML = `
                        <div class="favorite-card">
                            <div class="card-img-container">
                                <img src="${item.image}" alt="${item.name}" class="card-img-top">
                                <button class="remove-favorite" data-name="${item.name}">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title prata-font">${item.name}</h5>
                                <p class="card-text prata-font">$${item.price.toFixed(2)}</p>
                            </div>
                        </div>
                    `;
                    favoritesContainer.appendChild(favoriteCard);
                });
                
                // Add event listeners to remove buttons
                document.querySelectorAll('.remove-favorite').forEach(button => {
                    button.addEventListener('click', function() {
                        const name = this.getAttribute('data-name');
                        removeFavorite(name);
                    });
                });
            }
            
            function removeFavorite(name) {
                let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
                favorites = favorites.filter(item => item.name !== name);
                localStorage.setItem('favorites', JSON.stringify(favorites));
                loadFavorites();
            }
            
            // Initial load
            loadFavorites();
            
            // Listen for storage changes (in case favorites are modified in another tab)
            window.addEventListener('storage', function(e) {
                if (e.key === 'favorites') {
                    loadFavorites();
                }
            });
        });
    </script>
</body>
</html> 