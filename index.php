<?php
session_start();
include 'fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Devsun</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>

		html,
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
	.form-floating{
		margin: 10px;
	}
	</style>
</head>
<body class="text-center">
<main class="form-signin">
  <form action="register.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Register</h1>
    <?php
    // Display registration errors if any
    if (isset($_SESSION['register_errors'])) {
        foreach ($_SESSION['register_errors'] as $error) {
            echo '<div class="error" style="color: red; margin-bottom: 10px;">' . htmlspecialchars($error) . '</div>';
        }
        // Clear the errors after displaying them
        unset($_SESSION['register_errors']);
    }
    ?>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" autocomplete="off">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" autocomplete="off">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password" autocomplete="off">
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password" autocomplete="off">
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
	<br>
    <span>Already have an account? </span><a href="login.php">Sign in</a>
  </form>
</main>

</body>
</html>