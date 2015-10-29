<?php 
	include('model.php');
	
	$updateNews = new Model;
	
	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$title = trim($_POST['title']);
		$description = trim($_POST['description']);
		$autor = trim($_POST['autor']);
		
		
		$updateNews -> updateNews ($id, $title, $description, $autor);
		echo "Your news is updated. Thank you!"?>
		<a href="index.php">Back to All news</a>
		<?php
	}
	
	
	
?>