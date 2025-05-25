<?php
include 'fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">Furniture shop</div>
        <nav>
            <ul>
                <li><a href="firstpage.php">Home</a></li>
                <li><a href="abtus.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
            </ul>
        </nav>
    </header>
    <form action="form.php" method="post">
<div class="store-cards">

        <div class="square">

            <button class="furniture-btn" onclick="selectFurniture('Furniture 1')" data-furniture="Furniture 1" type="submit">Add To Cart</button>
            <img src="furnitureimg/furniture3.png" alt="" class="img">
            <h4 class="price" name="item_name">$250</h4>
            
        </div>

        <div class="square">
            <img src="furnitureimg/furniture6.png" alt="" class="img">
            <h4 class="price">$100</h4>
            <button class="furniture-btn"type="submit" onclick="selectFurniture('Furniture 2')"data-furniture="Furniture 2">Add To Cart</button>
        </div>

        <div class="square">
            <img src="furnitureimg/furniture8.png" alt="" class="img">
            <h4 class="price">$700</h4>
            <button class="furniture-btn"type="submit" onclick="selectFurniture('Furniture 3')"data-furniture="Furniture 3">Add To Cart</button>
        </div>

        <div class="square">
            <img src="furnitureimg/furniture10.png" alt="" class="img">
            <h4 class="price">$80</h4>
            <button class="furniture-btn"type="submit" onclick="selectFurniture('Furniture 4')"data-furniture="Furniture 4">Add To Cart</button>
        </div>

    </div>
    </form>
    
</body> 
</html>

<style>
body {
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    background-color: #94cdfc6b;
    width: 100%;
    min-height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.store-cards {
    margin-top:70px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-content: center;
}
.store-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .square {
            position: relative;
            width: 100%;
            max-width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .price {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #105353;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .furniture-btn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #188f8f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .furniture-btn:hover {
            background-color: #105353;
        }


header {
            background-color: #105353;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: "Dancing Script";
            font-size: 24px;
            margin-left: 20px;
            margin-top: 15px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center; /* Align items vertically */
        }

        nav ul li {
            margin-right: 20px;
        }

        a {
            color: black;
            text-decoration: none;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #105353;
            font-size: 32px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        ul li {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        ul li:last-child {
            border-bottom: none;
        }

        .shopping-cart {
            width: 30px;
            height: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        .order-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
        }

@media screen and (max-width: 768px) {
    .store-cards {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }

    .square {
        max-width: 150px;
    }
    nav {
        flex-direction: column;
        align-items: center;
    }

    nav ul {
        flex-direction: column;
        text-align: center;
    }

    nav ul li {
        margin: 10px 0;
    }

    .shopping-cart {
        margin-top: 10px;
        margin-right: 0;
    }
}

</style>

<script>
    function addToCart(itemName, itemPrice) {

        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        cartItems.push({ name: itemName, price: itemPrice });

        localStorage.setItem('cartItems', JSON.stringify(cartItems));

    }


        

</script>

