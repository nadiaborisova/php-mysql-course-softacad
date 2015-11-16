<?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	
		$id = $_GET['id'];
		$selectComp = new Model;
		$selectComp->selectOne($id, 'computers');
		$rowsNum = $selectComp->getRowsNum();
		$rows = $selectComp->getRows();
		$query = $selectComp->getQuery();
		$row = mysqli_fetch_array($query);
?>
<div id="content">
	<div align="center">
		<img src="images/<?php echo $row['image']; ?>.jpg"/>
		<h2><?php echo $row['make']; ?></h2>
		<h2><?php echo $row['model']; ?></h2>
		<h3>Year: <?php echo $row['year']; ?> </h3>
		<h3>RAM: <?php echo $row['ram']; ?> </h3>
		<h3>Processor: <?php echo $row['processor']; ?> </h3>
		<h3>Video Card: <?php echo $row['videocard']; ?> </h3>
		<h3>PRICE: $<?php echo $row['price']; ?></h3>
		<br/>
		<form action="basket.php" method="GET">
			<input type="text" name="id" value="<?php echo $row['id']; ?>" hidden/>
			<input type="text" name="products" value="computers" hidden/>
			<input type="submit" name="submit" value="Add to basket">
		</form>
	</div>
	<div class="clear-float"></div>
</div>
<?php include('templates/footer.php'); ?>