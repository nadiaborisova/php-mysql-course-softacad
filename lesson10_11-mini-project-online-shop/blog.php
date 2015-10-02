<?php 
	include('database.php');
	include('header.php'); 
	include('menu.php'); 
?>
<div id="content">
<h2>Blog</h2>
	<?php for ($i=1; $i<=5; $i++){ ?>
		<h3><a href="blogpost.php?post-id=<?php echo $i; ?>"><?php echo $postTitle[$i]; ?></a> </h3>
		<p><?php echo substr($postDescription[$i], 0, 150); ?>... <a href="blogpost.php?post-id=<?php echo $i; ?>">Read more</a></p>
		<br/>
	<?php } ?>
</div>
<?php include('footer.php'); ?>