<?php 
	include('header.php'); 
	include('connect.php');
?>
<div class="content">
	<h1>LOGIN</h1>
	<form action="login.php" method="post">
		<table>
			<tr>
				<td><strong>Username:</strong></td>
				<td><input type="text" name="username"/></td>
			</tr>				
			<tr>
				<td><strong>Password:</strong></td>
				<td><input type="password" name="password"/></td>
			</tr>	
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="LOGIN"/>
					<input type="reset" name="reset" value="RESET"/>
				</td>				
			</tr>
		</table>
	</form>
</div>
<?php include('footer.php'); ?>

