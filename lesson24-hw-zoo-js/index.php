<?php 
	require('templates/header.php');
	require('db/model.php'); 
	
	
	if(isset($_SESSION['login'])){
	$username = $_SESSION['login'];
	
	$selectAnimals = new Model;
	$selectAnimals->selectAll();
	$rowsNum = $selectAnimals->getRowsNum();
	$rows = $selectAnimals->getRows();
	$query = $selectAnimals->getQuery();
?>
	<script>
		function getTiger (){
			document.getElementById('animalHidden').value = 'tiger'; 
			document.getElementById('animal').innerHTML = 'tiger'; 
			document.getElementById('tigerImg').style.border = '2px solid red'; 
			document.getElementById('zebraImg').style.border = '0';
			document.getElementById('lionImg').style.border = '0';
		}
		function getZebra (){
			document.getElementById('animalHidden').value = 'zebra'; 
			document.getElementById('animal').innerHTML = 'zebra'; 
			document.getElementById('tigerImg').style.border = '0'; 
			document.getElementById('zebraImg').style.border = '2px solid red';
			document.getElementById('lionImg').style.border = '0';
		}
		function getLion (){
			document.getElementById('animalHidden').value = 'lion'; 
			document.getElementById('animal').innerHTML = 'lion';
			document.getElementById('tigerImg').style.border = '0'; 
			document.getElementById('zebraImg').style.border = '0';
			document.getElementById('lionImg').style.border = '2px solid red';
		}
		function getMeat (){
			document.getElementById('mealHidden').value = 'meat'; 
			document.getElementById('meal').innerHTML = 'meat'; 
			document.getElementById('meatImg').style.border = '2px solid red'; 
			document.getElementById('strawImg').style.border = '0';
			document.getElementById('tigerMealImg').style.border = '0';
		}
		function getStraw (){
			document.getElementById('mealHidden').value = 'straw'; 
			document.getElementById('meal').innerHTML = 'straw'; 
			document.getElementById('meatImg').style.border = '0'; 
			document.getElementById('strawImg').style.border = '2px solid red';
			document.getElementById('tigerMealImg').style.border = '0';
		}
		function getTigerMeal (){
			document.getElementById('mealHidden').value = 'tiger meal'; 
			document.getElementById('meal').innerHTML = 'tiger meal'; 
			document.getElementById('meatImg').style.border = '0'; 
			document.getElementById('strawImg').style.border = '0';
			document.getElementById('tigerMealImg').style.border = '2px solid red';
		}
	</script>
	
	<p>Hello, <?php echo $username; ?> ||| <a href="logout.php"> Logout </a></p>
	
	<h2>ANIMAL FEEDING PANEL</h2>
	
	<table border="1" align="center">
		<tr>
			<th>Select an animal:</th>
			<th>Select the meal:</th>
			<th>Select quantity:</th>
		</tr>
		<tr>
			<td>
				<img src="images/tiger.png" id="tigerImg" onclick="getTiger();" />
				<img src="images/lion.png" id="lionImg" onclick="getLion();" />
				<img src="images/zebra.png" id="zebraImg" onclick="getZebra();" />
			</td>
			<td>
				<img src="images/straw.png" id="strawImg" onclick="getStraw();" />
				<img src="images/meat.png" id="meatImg" onclick="getMeat();" />
				<img src="images/tiger-meal.png" id="tigerMealImg" onclick="getTigerMeal();" />
			</td>
			<td>
				<select id="qty" onchange="document.getElementById('quantity').value = document.getElementById('qty').value">
					<option>Select</option>
					<option>100</option>
					<option>200</option>
					<option>300</option>
					<option>400</option>
					<option>500</option>
					<option>600</option>
					<option>700</option>
					<option>800</option>
					<option>900</option>
					<option>1000</option>
					<option>1100</option>
					<option>1200</option>
					<option>1300</option>
					<option>1400</option>
				</select>
			</td>
		</tr>
	</table>
	<br/><br/>
	<form action="update.php" method="post">
		<strong>Selected:</strong>
		<p>Animal: <span id="animal"></span><input type="hidden" id="animalHidden" name="animal"/></p>
		<p>Meal: <span id="meal"></span><input type="hidden" id="mealHidden" name="meal"/></p>
		<p>Quantity:  <input type="text" id="quantity" name="quantity" onchange="alert('Do not change this field!'); document.getElementById('quantity').value = document.getElementById('qty').value"/></p>
		<input type="submit" value="Update" name="submit">
	</form>
	<br/><br/>
	<h2>ANIMAL INFORMATION</h2>
	<input type="button" value="Tiger" name="tiger" onclick="document.getElementById('tiger').style.display = '';" />
	<input type="button" value="Lion" name="lion" onclick="document.getElementById('lion').style.display = '';" />
	<input type="button" value="Zebra" name="zebra" onclick="document.getElementById('zebra').style.display = '';" />
	<br/>
	<?php
	
	for($i=0; $i<$rowsNum; $i++){
		$selectAnimals = mysqli_fetch_array($query);
	?>
	<div id="<?php echo $selectAnimals['animal']; ?>" style="display: none"><strong>Animal: <?php echo $selectAnimals['animal']; ?></strong>
		<div>Meal: <?php echo $selectAnimals['meal']; ?></div>
		<div>Quantity: <?php echo $selectAnimals['mealQty']; ?></div>
		<div>Time: <?php echo $selectAnimals['feedingTime']; ?></div>
	</div>
	<br/>
<?php 
} 
}else {
?>

	<h1>LOGIN</h1>
	<form action="login.php" method="post">
		<table>
			<tr>
				<td><strong>Username:</strong></td>
				<td><input type="text" name="username"/></td>
			</tr>				
			<tr>
				<td><strong>Password:</strong></td>
				<td><input type="password" name="password"/></td>
			</tr>	
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="LOGIN"/>
				</td>				
			</tr>
		</table>
	</form>
	


<?php 
}
	require('templates/footer.php');
?>
