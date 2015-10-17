<?php
	include('header.php');
	include('connect.php');
 
	$username=stripslashes($_POST['username']);
	$password=stripslashes(md5($_POST['password']));
	if (isset($_POST['submit'])) {
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