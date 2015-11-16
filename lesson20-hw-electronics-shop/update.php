  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	
	if (isset($_POST['submit'])){
		$updateProduct = new Model;
		$id = $_POST['id'];
		$products = $_POST['products'];
		$make = trim($_POST['make']);
		$model = trim($_POST['model']);
		$year = trim($_POST['year']);
		$price = trim($_POST['price']);
		
		
		$updateProduct -> updateProduct ($id, $products, $make, $model, $year, $price);
		echo "<br/><br/>The product is updated. Thank you!"?>
		<a href="admin.php">Back to Admin panel</a><br/><br/>
		<?php
	}
include('templates/footer.php'); 
?>