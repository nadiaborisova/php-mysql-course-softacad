<?php 
	include('database.php'); 
	$id = $_GET['pid'];	
	include('header.php');
	include('menu.php'); 
?>
<div id="content">
	<div class="left item">
		<h2><?php echo $productName[$id]; ?></h2>
		<h3>PRICE: $<?php echo $productPrice[$id]; ?></h3>
		<br/>
		<input type="button" value="BUY">
	</div>
	<img class="left itemImg" src="images/item<?php echo $id; ?>.jpg">
	<br class="clear"/>
	<p><?php echo $productDescription[$id]; ?> </p>
</div>
<?php include('footer.php'); ?>