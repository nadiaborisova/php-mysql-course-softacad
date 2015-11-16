  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	$queriesRouters = new Model();
	$queriesRouters->selectAll('routers');
	$rowsNum = $queriesRouters->getRowsNum();
	$rows = $queriesRouters->getRows();
	$result = $queriesRouters->getQuery();

?>
<div id="content">
	<div class="content-header-basket">
		<a href="basket.php">
			<span>My basket</span><br/>
			<img src="images/basket-img.jpg"/>
		</a>
	</div>
		<h1>ROUTERS</h1>
	<div class="clear-float"></div>
	<?php 
	for($i=0; $i<$rowsNum; $i++){
		$rowRouters = mysqli_fetch_array($result);
		$_SESSION['rowRouters'] = $rowRouters;
		
	?>
	<div class="item">
		<a href="router.php?id=<?php echo $rowRouters['id']; ?>">
		<img src="images/<?php echo $rowRouters['image'];?>.jpg"/>
		<h3><?php echo $rowRouters['make']; ?> </h3></a>
			<h4>Model: <?php echo $rowRouters['model']; ?> </h4>
			<h4>Price: $<?php echo $rowRouters['price']; ?></h4>
			<form action="basket.php" method="GET">
				<input type="text" name="id" value="<?php echo $rowRouters['id']; ?>" hidden/>
				<input type="text" name="products" value="routers" hidden/>
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