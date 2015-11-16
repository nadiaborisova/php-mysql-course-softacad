  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
	?>
<div>
	<h1>Add product</h1>
	<form action="add.php" method="post">
		<table align="center">
			<tr>
				<th><span>Product category:</span></th>
				<td>	
					<select name="products" id="options"  onchange="optionsCheck()">
						<option>Please select</option>
						<option value="computers">Computers</option>
						<option value="printers">Printers</option>
						<option value="routers">Routers</option>
					</select>
				</td>
			</tr>	
			<tr>
				<th><span>Make:</span></th>
				<td><input type="text" name="make"/></td>
			</tr>			
			<tr>
				<th><span>Model:</span></th>
				<td><input type="text" name="model"/></td>
			</tr>			
			<tr>
				<th><span>Year:</span></th>
				<td><input type="text" name="year"/></td>
			</tr>
			<tr>
				<th><span>Price ($):</span></th>
				<td><input type="text" name="price"/></td>
			</tr>
			<tr  >
				<th class="comp" style="display:none"><span>RAM:</span></th>
				<td class="comp" style="display:none"><input type="text" name="ram"/></td>
			</tr>			
			<tr>
				<th class="comp" style="display:none"><span>Processor:</span></th>
				<td class="comp" style="display:none"><input type="text" name="processor"/></td>
			</tr>
			<tr>
				<th class="comp" style="display:none"><span>Videocard:</span></th>
				<td class="comp" style="display:none"><input type="text" name="videocard"/></td>
			</tr>
			<tr>
				<th class="printers" style="display:none"><span>Type:</span></th>
				<td class="printers" style="display:none"><input type="text" name="type"/></td>
			</tr>
			<tr>
				<th class="printers" style="display:none"><span>Number of Pages:</span></th>
				<td class="printers" style="display:none"><input type="text" name="numOfPages"/></td>
			</tr>			
			<tr>
				<th class="routers" style="display:none"><span>Frequency:</span></th>
				<td class="routers" style="display:none"><input type="text" name="frequency"/></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="ADD PRODUCT"/></td>
				<td><input type="reset" name="reset" value="RESET"/></td>
			</tr>
		</table>
	</form>
	<br/>
	<br/>
	<span><a href="index.php">Back to Admin panel</a><span>
</div>
<script>
function optionsCheck(){
	var option = document.getElementById("options").value;
	
	switch (option){
		case 'computers':
			var comp = document.getElementsByClassName("comp");
			for (i = 0; i < comp.length; i++) {
				comp[i].style.display = "block";
			}
			var printers = document.getElementsByClassName("printers");
			for (i = 0; i < printers.length; i++) {
				printers[i].style.display = "none";
			}
			var routers = document.getElementsByClassName("routers");
			for (i = 0; i < routers.length; i++) {
				routers[i].style.display = "none";
			}
			break;
		case 'printers':
			var printers = document.getElementsByClassName("printers");
			for (i = 0; i < printers.length; i++) {
				printers[i].style.display = "block";
			}
			var routers = document.getElementsByClassName("routers");
			for (i = 0; i < routers.length; i++) {
				routers[i].style.display = "none";
			}
			var comp = document.getElementsByClassName("comp");
			for (i = 0; i < comp.length; i++) {
				comp[i].style.display = "none";
			}
			break;
		case 'routers':
			var routers = document.getElementsByClassName("routers");
			for (i = 0; i < routers.length; i++) {
				routers[i].style.display = "block";
			}
			var comp = document.getElementsByClassName("comp");
			for (i = 0; i < comp.length; i++) {
				comp[i].style.display = "none";
			}
			var printers = document.getElementsByClassName("printers");
			for (i = 0; i < printers.length; i++) {
				printers[i].style.display = "none";
			}
			break;
		default: error;
	}
}

</script>
<?php include('templates/footer.php'); ?>