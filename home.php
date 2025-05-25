<?php 
   
session_start();
 include 'fonts.php';
include_once('config.php');

if ($_SESSION['is_admin'] == 'true') {

    $sql = "SELECT * FROM clothes";
    $selectClothes = $conn->prepare($sql);
    $selectClothes->execute();
    $clothes_data = $selectClothes->fetchAll();

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
</head>

<body>

    <header>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
           <?php if ($_SESSION['is_admin'] == 'true') { ?>
            <li class="nav-item">
            <a class="nav-link" href="home.php">
              <span ></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <span ></span>
              Orders
            </a>
          </li>
          
        </ul>
        <?php }else {header("Location: firstpage.php");?>
          
      <?php
      } ?>

        
      </div>
    </nav>
    </header>

    <?php foreach ($clothes_data as $clothe_data) {}?>

<div class="col">
<div class="card shadow-sm">

  <img src="clothesimg/<?php echo $clothe_data['clothe_image'];  ?>" height="350">

  <div class="card-body">
    <h4><?php echo $clothe_data['clothe_name']; ?></h4>
    <div class="d-flex justify-content-between align-items-center">
    </div>
  </div>
</div>
</div>
    


</body>

</html>

<style>
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

</style>
