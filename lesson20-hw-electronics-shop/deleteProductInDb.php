  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	$deleteProduct = new Model;
	$id = $_GET['id'];
	$products = $_GET['products'];
	
	$deleteProduct -> deleteProduct($id, $products);
	
	echo "<br/><br/>The product is deleted successfully!"?>
	<br/>
	<a href="admin.php">Back to Admin panel</a>
	<br/>
	<br/>
	<br/>
<?php include('templates/footer.php'); ?>