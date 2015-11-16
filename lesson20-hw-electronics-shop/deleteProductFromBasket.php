  <?php 
	session_start();
	if(isset($_GET['submit'])){
		switch($_GET['products']){
			case 'computers':
				unset($_SESSION['cart_item']['computers'][$_GET['id']]);
				header("Location: basket.php");
				break;
			case 'printers':
				unset($_SESSION['cart_item']['printers'][$_GET['id']]);
				header("Location: basket.php");
				break;
			case 'routers':
				unset($_SESSION['cart_item']['routers'][$_GET['id']]);
				header("Location: basket.php");
				break;
		}
	}
	?>