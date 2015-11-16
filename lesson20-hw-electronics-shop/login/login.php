<?php
	include('../templates/header.php');
	include('../db/model.php');
 
	if (isset($_POST['submit'])) {
		$username=trim($_POST['username']);
		$password=trim(md5($_POST['password']));
		
		if (empty($username) || empty($password)) {
			echo "Please enter your username and password!";
		}
		else {
		
			$users=new Model();
			$users->selectUser('user1', 'user1');
			$rows = $users->getRowsNum();
			$query = $users->getQuery();
			$row = mysqli_fetch_array($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username;
				$_SESSION['cart_item'] = array();
				header("Location: ../admin.php");
			} 
			else {
				echo "Login failed!";
			}
		}
	}	
?>

