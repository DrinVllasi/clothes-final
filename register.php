<?php

	include_once('config.php');

	if(isset($_POST['submit']))
	{

		$username = $_POST['username'];
		$email = $_POST['email'];

		$tempPass = $_POST['password'];
		$password = password_hash($tempPass, PASSWORD_DEFAULT);



		$tempConfirm = $_POST['confirm_password'];
		$confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);


		if(empty($username) || empty($email) || empty($password))
		{
			echo "You have not filled in all the fields.";
		}
		else
		{

			$sql = "INSERT INTO users(username,email,password) VALUES (:username, :email, :password)";

			$insertSql = $conn->prepare($sql);
			
			$insertSql->bindParam(':username', $username);
			$insertSql->bindParam(':email', $email);
			$insertSql->bindParam(':password', $password);
			
			$insertSql->execute();

			header("Location: login.php");
		}
	}
?>