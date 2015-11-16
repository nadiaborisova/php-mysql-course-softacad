  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	$queriesPrinters = new Model();
	$queriesPrinters->selectAll('printers');
	$rowsNum = $queriesPrinters->getRowsNum();
	$rows = $queriesPrinters->getRows();
	$result = $queriesPrinters->getQuery();

?>
<div id="content">
	<div class="content-header-basket">
		<a href="basket.php">
			<span>My basket</span><br/>
			<img src="images/basket-img.jpg"/>
		</a>
	</div>
		<h1>PRINTERS</h1>
	<div class="clear-float"></div>
	<?php 
	for($i=0; $i<$rowsNum; $i++){
		$rowPrinters = mysqli_fetch_array($result);
		$_SESSION['rowPrinters'] = $rowPrinters;
	?>
	<div class="item">
		<a href="printer.php?id=<?php echo $rowPrinters['id']; ?>">
		<img src="images/<?php echo $rowPrinters['image'];?>.jpg"/>
		<h3><?php echo $rowPrinters['make']; ?> </h3></a>
			<h4>Model: <?php echo $rowPrinters['model']; ?> </h4>
			<h4>Price: $<?php echo $rowPrinters['price']; ?></h4>
			<form action="basket.php" method="GET">
				<input type="text" name="id" value="<?php echo $rowPrinters['id']; ?>" hidden/>
				<input type="text" name="products" value="printers" hidden/>
				<input type="submit" name="submit" value="Add to basket">
			</form>
	</div>
	<?php
	}
	?>
	<div class="clear-float"></div>
</div>
<?php
include('templates/footer.php'); 
?>