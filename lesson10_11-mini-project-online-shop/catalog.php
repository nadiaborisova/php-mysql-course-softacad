<?php 
	include('database.php');
	include('header.php'); 
	include('menu.php'); 
?>
<div id="content">
	<h2>Catalog</h2>
	<?php for($i=1; $i<=count($productName); $i++){ ?>
		<div class="product <?php echo ($i%2==0?'left':'right');?>">
			<img src="images/item<?php echo $i; ?>.jpg">
			<a href="product.php?pid=<?php echo $i; ?>">
				<h3><?php echo $productName[$i]; ?> </h3>
			</a>
			<h4>$<?php echo $productPrice[$i]; ?></h4>
			</div>
			<?php } ?>
			<br class="clear"/>
		
</div>
<?php include('footer.php'); ?>