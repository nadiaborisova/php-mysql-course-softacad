<?php 
	include('model.php');
	
	$addNews = new Model;
	
	if (isset($_POST['submit'])){
		$title = trim($_POST['title']);
		$description = trim($_POST['description']);
		$autor = trim($_POST['autor']);
		$addNews -> insertOneNews ($title, $description, $autor);
		echo "Your news is added. Thank you!"?>
		<a href="index.php">Back to All news</a>
		<?php
	}
	
	
	
?>