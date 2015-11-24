<?php
	include('templates/header.php');
	include('db/model.php');
 
	if (isset($_POST['submit'])) {
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);
		
		if (empty($username) || empty($password)) {
			echo "Please enter your username and password!";
		}
		else {
			$users=new Model();
			$users->selectUser($username, $password);
			$rows = $users->getRowsNum();
			$query = $users->getQuery();
			$row = mysqli_fetch_array($query);
			if ($rows == 1) {
				$_SESSION['login']=$username;
				header("Location: index.php");
			} 
			else {
				echo "Login failed!";
			}
		}
	}	
?>

