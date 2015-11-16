<?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 

	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	if(isset($_GET['submit'])){
		$id = $_GET['id'];
		$products = $_GET['products'];
		
		$selectProduct = new Model;
		$selectProduct->selectOne($id, $products);
		$rows = $selectProduct->getRows();
		$query = $selectProduct->getQuery();
		$row = mysqli_fetch_array($query);
		$make = $row['make'];
		$model = $row['model'];
		$price = $row['price'];
		switch($products){
			case 'computers': 
				$_SESSION['cart_item']['computers'] = array($id=>array('make' => $make, 'model' => $model, 'price' => $price));
			break;
			case 'printers': 
				$_SESSION['cart_item']['printers'] = array($id=>array('make' => $make, 'model' => $model, 'price' => $price));
			break;
			case 'routers': 
				$_SESSION['cart_item']['routers'] = array($id=>array('make' => $make, 'model' => $model, 'price' => $price));
			break;
			default: 'Error';
		}
	}
	
if (empty($_SESSION['cart_item']['computers'])&& empty($_SESSION['cart_item']['printers'])&&empty($_SESSION['cart_item']['routers'])){
	echo "<br/><br/><br/><br/>Your basket is empty!<br/><br/><br/><br/>";
	}else{
?>
	<div align="center">

		<h1>My basket</h1>
		
		<table border=1 id="mybasket">
			<tr>
				<th width="400px">Product Name</th>
				<th width="100px">Product price</th>
				<th width="80px">Operations</th>
			</tr>
						<?php
			if(isset($_SESSION['cart_item']['computers'])){
				foreach($_SESSION['cart_item']['computers'] as $key=>$value){?>
			<tr>
				<td>
					<h4><?php echo $value['make']; ?> , <?php echo $value['model']; ?></h4>
				</td>
				<td>
					<span>$<?php echo $value['price']; ?></span>
				</td>
				<td>
					<form action="deleteProductFromBasket.php" method="GET">
						<input type="hidden" name="id" value="<?php echo $key; ?>"/>
						<input type="hidden" name="products" value="computers"/>
						<input type="submit" name="submit" value="REMOVE"/>
					</form>
				</td>
			</tr>	
			<?php 
				}	
			}
			if(isset($_SESSION['cart_item']['printers'])){
				foreach($_SESSION['cart_item']['printers'] as $key=>$value){?>
			<tr>
				<td>
					<h4><?php echo $value['make']; ?> , <?php echo $value['model']; ?></h4>
				</td>
				<td>
					<span>$<?php echo $value['price']; ?></span>
				</td>
				<td>
					<form action="deleteProductFromBasket.php" method="GET">
						<input type="hidden" name="id" value="<?php echo $key; ?>"/>
						<input type="hidden" name="products" value="printers"/>
						<input type="submit" name="submit" value="REMOVE"/>
					</form>
				</td>
			</tr>	
			<?php 
				}	
			}
			if(isset($_SESSION['cart_item']['routers'])){
				foreach($_SESSION['cart_item']['routers'] as $key=>$value){?>
					<tr>
						<td>
							<h4><?php echo $value['make']; ?> , <?php echo $value['model']; ?></h4>
						</td>
						<td>
							<span>$<?php echo $value['price']; ?></span>
						</td>
						<td>
							<form action="deleteProductFromBasket.php" method="GET">
								<input type="hidden" name="id" value="<?php echo $key; ?>"/>
								<input type="hidden" name="products" value="routers"/>
								<input type="submit" name="submit" value="REMOVE"/>
							</form>
						</td>
					</tr>	
			<?php 
				}	
			}
			?>
		</table>
	</div>
<?php
}
include('templates/footer.php'); ?>