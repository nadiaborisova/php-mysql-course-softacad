<?php
	include('header.php');
	include('connect.php');
 
	if (isset($_POST['submit'])) {
		$username=trim($_POST['username']);
		$password=trim(md5($_POST['password']));
		if (empty($username) || empty($password)) {
			echo "Login failed!";
		}
		else {
			$query = mysqli_query($link, "SELECT * FROM users WHERE password='$password' AND username='$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username;
				header("Location: user_profile.php");
			} 
			else {
				echo "Login failed!";
			}
		}
	}	
?>