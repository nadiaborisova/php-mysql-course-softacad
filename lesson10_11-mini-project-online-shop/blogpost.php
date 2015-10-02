<?php 
	include('database.php'); 
	$post_id = $_GET['post-id'];	
	include('header.php');
	include('menu.php'); 
?>
<div id="content">
	<h3><?php echo $postTitle[$post_id]; ?></h3>
	<p><?php echo $postDescription[$post_id]; ?> </p>
	<p><a href="blog.php">Back</a></p>
</div>
<?php include('footer.php'); ?>
