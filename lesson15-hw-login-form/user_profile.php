<?php 
	include('header.php'); 
	include('connect.php');
	$username=$_SESSION['login_user'];
	
	$result = mysqli_query($link, "SELECT u.*, up.* FROM users u LEFT JOIN user_profiles up ON u.id=up.user_id WHERE username='$username'");
	$rowsNum = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
?>
<div class="content">
	<span>Hello, <?php echo $row['first_name'].' '. $row['family_name']; ?> ||| <a href='logout.php'>Logout</a><span>
	<h1>USER PROFILE</h1>
	<table>
		<tr>
			<td><strong>First name:</strong></td>
			<td><?php echo $row['first_name']; ?></td>
		</tr>	
		<tr>
			<td><strong>Family name:</strong></td>
			<td><?php echo $row['family_name']; ?></td>
		</tr>			
		<tr>
			<td><strong>City:</strong></td>
			<td><?php echo $row['city']; ?></td>
		</tr>	
		<tr>
			<td><strong>Email:</strong></td>
			<td><?php echo $row['email']; ?></td>
		</tr>	
	</table>
</div>
<?php include('footer.php'); ?>