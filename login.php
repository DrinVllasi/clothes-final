<?php
include 'fonts.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
	body {
	  height: 100%;
	}

	body {
	  display: flex;
	  align-items: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}

	.form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: auto;
	}

	.form-signin .checkbox {
	  font-weight: 400;
	}

	.form-signin .form-floating:focus-within {
	  z-index: 2;
	}

	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}

	.error {
	  color: red;
	  margin-bottom: 10px;
	}
	</style>
</head>
<body class="text-center">
<!-- Creating a from which will post some data in loginLogic.php file -->
<main class="form-signin">
  <form action="loginLogic.php" method="post">
    
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <?php
    // Display errors if any
    if (isset($_SESSION['login_errors'])) {
        foreach ($_SESSION['login_errors'] as $error) {
            echo '<div class="error">' . htmlspecialchars($error) . '</div>';
        }
        // Clear the errors after displaying them
        unset($_SESSION['login_errors']);
    }
    ?>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
	<br>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
	<p>Don't have an account? <a href="index.php" >Sign up</a> </p>
  </form>
</main>

</body>
</html>