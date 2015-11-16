  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	
	$queriesComp = new Model();
	$queriesComp->selectAll('computers');
	$rowsNum = $queriesComp->getRowsNum();
	$rows = $queriesComp->getRows();
	$result = $queriesComp->getQuery();

?>
<div id="content">
	<div class="content-header-basket">
		<a href="basket.php">
			<span>My basket</span><br/>
			<img src="images/basket-img.jpg"/>
		</a>
	</div>
		<h1>COMPUTERS</h1>
	<div class="clear-float"></div>
	<?php 
	for($i=0; $i<$rowsNum; $i++){
		$rowComp = mysqli_fetch_array($result);
		$_SESSION['rowComp'] = $rowComp;
		
	?>
	<div class="item">
		<a href="computer.php?id=<?php echo $rowComp['id']; ?>">
		<img src="images/<?php echo $rowComp['image'];?>.jpg"/>
		<h3><?php echo $rowComp['make']; ?> </h3></a>
			<h4>Model: <?php echo $rowComp['model']; ?> </h4>
			<h4>Price: $<?php echo $rowComp['price']; ?></h4>
			<form action="basket.php" method="GET">
				<input type="text" name="id" value="<?php echo $rowComp['id']; ?>" hidden/>
				<input type="text" name="products" value="computers" hidden/>
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