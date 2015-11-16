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
		$products = $_POST['products'];
		$addProduct = new Model;
		switch ($products){
			case 'computers':
				$make = trim($_POST['make']);
				$model = trim($_POST['model']);
				$year = trim($_POST['year']);
				$price = trim($_POST['price']);
				$ram = trim($_POST['ram']);
				$processor = trim($_POST['processor']);
				$videocard = trim($_POST['videocard']);
				$addProduct -> addComp ($products, $make, $model, $year, $price, $ram, $processor, $videocard);
				echo "<br/><br/>The computer is added. Thank you!";
				break;
			case 'printers':
				$make = trim($_POST['make']);
				$model = trim($_POST['model']);
				$year = trim($_POST['year']);
				$price = trim($_POST['price']);
				$type = trim($_POST['type']);
				$numOfPages = trim($_POST['numOfPages']);
				$addProduct -> addPrinter ($products, $make, $model, $year, $price, $type, $numOfPages);
				echo "<br/><br/>The printer is added. Thank you!";
				break;
			case 'routers':
				$make = trim($_POST['make']);
				$model = trim($_POST['model']);
				$year = trim($_POST['year']);
				$price = trim($_POST['price']);
				$frequency = trim($_POST['frequency']);
				$addProduct -> addRouter ($products, $make, $model, $year, $price, $frequency);
				echo "<br/><br/>The router is added. Thank you!";
				break;
			default: 'Error';
		}
		?>
		<a href="admin.php">Back to Admin panel</a><br/><br/>
		<?php
	}
include('templates/footer.php'); 
?>