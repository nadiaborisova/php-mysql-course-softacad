<?php
	session_start();
	include('connect.php');
	$error=''; 
	if (isset($_POST['submit'])) {

		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}
		else
		{
			$username=trim($_POST['username']);
			$password=trim($_POST['password']);

			$query = mysqli_query($link, "SELECT * FROM users WHERE password='$password' AND username='$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username;
				header("location: statistic.php");
			} else {
				$error = "Username or Password is invalid";
			}
		}
	}
	mysqli_close($link);	
?>