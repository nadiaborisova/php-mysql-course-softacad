<?php 
	include('model.php');
	
	$deleteNews = new Model;
	$id=$_GET['id'];
	
	$deleteNews -> deleteNews($id);
	echo "Your news is deleted. Thank you!"?>
	<br/>
	<a href="index.php">Back to All news</a>

	
<?php include('footer.php'); ?>