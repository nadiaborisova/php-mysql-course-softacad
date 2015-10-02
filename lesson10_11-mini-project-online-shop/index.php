<?php 
	include('database.php');
	include('header.php'); 
	include('menu.php'); 
?>
<div id="content">
<h2>Welcome to our Online shop!</h2>
	Lorem Ipsum is simply dummy text of the printing and typesetting industry.
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
	took a galley of type and scrambled it to make a type specimen book. It has survived not only five
	centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
	It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
	and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
	took a galley of type and scrambled it to make a type specimen book. It has survived not only five
	centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
	<br/><br/>
	<?php for($i=1; $i<=4; $i++){ ?>
	<div class="product <?php echo ($i%2==0?'left':'right')?>">
		<img src="images/item<?php echo $i;?>.jpg"/>
		<a href="product.php?pid=<?php echo $i; ?>">
			<h3><?php echo $productName[$i]; ?> </h3>
		</a>
		<h4><?php echo $productPrice[$i]; ?>$</h4>
	</div>
	<?php } ?>
	<br class="clear"/>
	<h2>Blog</h2>
<?php for ($i=1; $i<=3; $i++){ ?>
		<h3><a href="blogpost.php?post-id=<?php echo $i; ?>"><?php echo $postTitle[$i]; ?></a> </h3>
		<p><?php echo substr($postDescription[$i], 0, 150); ?>... <a href="blogpost.php?post-id=<?php echo $i; ?>">Read more</a></p>
		<br/>
	<?php } ?>
</div>
<?php include('footer.php'); ?>