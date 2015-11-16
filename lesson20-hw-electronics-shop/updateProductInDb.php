  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	
	$selectProduct = new Model;
	$id=$_GET['id'];
	$products=$_GET['products'];
	$selectProduct -> selectOne ($id, $products);
	$rows = mysqli_fetch_array($selectProduct->getQuery());
?>
<div id="content" align="center">
	<br/>
	<h1>UPDATE PRODUCT</h1>
	<h2><?php echo $rows['make'].",".$rows['model']; ?></h2>
	<form action="update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $rows['id']; ?>"/>
		<input type="hidden" name="products" value="<?php echo $products; ?>"/>
		<table>
			<tr>
				<th><span>Make:</span></th>
				<td><input type="text" name="make" value="<?php echo $rows['make']; ?>"/></td>
			</tr>			
			<tr>
				<th><span>Model:</span></th>
				<td><input type="text" name="model" value="<?php echo $rows['model']; ?>"/></td>
			</tr>		
			<tr>
				<th><span>Year:</span></th>
				<td><input type="text" name="year" value="<?php echo $rows['year']; ?>"/></td>
			</tr>				
			<tr>
				<th><span>Price ($):</span></th>
				<td><input type="text" name="price" value="<?php echo $rows['price']; ?>"/></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="UPDATE"/></td>
				<td><input type="reset" name="reset" value="RESET"/></td>
			</tr>
		</table>
	</form>
	<br/>
	<br/>
</div>
<?php include('templates/footer.php'); ?>