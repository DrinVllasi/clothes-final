<?php
 /*
  We will include config.php for connection with database.
  We will get datas from index.php file, and inster them into database when Sign up button is clicked in index.php file.
  If any of session is empty we will get a message
  */

	include_once('config.php');
	include 'fonts.php';
	if(isset($_POST['submit']))
	{

		$username = $_POST['username'];
		$email = $_POST['email'];
		$address = $_POST['address'];


		if(empty($username) || empty($email) || empty($address))
		{
			echo "You have not filled in all the fields.";
		}
		else
		{

			$sql = "INSERT INTO orders(username,email,address) VALUES (:username, :email, :address)";

			$insertSql = $conn->prepare($sql);
			

			$insertSql->bindParam(':username', $username);
			$insertSql->bindParam(':email', $email);
			$insertSql->bindParam(':address', $address);

			$insertSql->execute();

			header("Location: firstpage.php");


		}



	}


?>