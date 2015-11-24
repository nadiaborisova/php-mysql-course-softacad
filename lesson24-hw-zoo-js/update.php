  <?php 
	require('db/model.php');
	if (isset($_POST['submit'])){
		$updateAnimal = new Model;
		$animal = $_POST['animal'];
		$meal = $_POST['meal'];
		$quantity = $_POST['quantity'];

		
		$updateAnimal -> updateAnimal ($animal, $meal, $quantity);
		header("Location: index.php");
	}
?>