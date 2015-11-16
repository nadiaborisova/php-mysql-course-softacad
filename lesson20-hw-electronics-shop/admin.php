  <?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	include('db/model.php'); 
?>
<div id="content" align="center">
<?php
	
if(isset($_SESSION['login_user'])) {
	
	$getComp = new Model;
	$getComp->selectAll('computers');
	$rowsNumComp = $getComp->getRowsNum();
	$rowsComp = $getComp->getRows();
	$resultComp = $getComp->getQuery();
	
	$getPrinters = new Model;
	$getPrinters->selectAll('printers');
	$rowsNumPrinters = $getPrinters->getRowsNum();
	$rowsPrinters = $getPrinters->getRows();
	$resultPrinters = $getPrinters->getQuery();
	
	$getRouters = new Model;
	$getRouters->selectAll('routers');
	$rowsNumRouters = $getRouters->getRowsNum();
	$rowsRouters = $getRouters->getRows();
	$resultRouters = $getRouters->getQuery();

?>
	<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	

	<h1>ADMIN PANEL</h1>
	<a href="addProduct.php"> Add product </a>
	<h2>Computers</h2>
	<table border=1>
		<tr>
			<th width="30px;">ID</th>
			<th width="400px;">Make and Model</th>
			<th width="100px;">Operations</th>
		</tr>
		<?php 
			for($i=0; $i<$rowsNumComp; $i++){
			$rowsComp = mysqli_fetch_array($resultComp);
		?>
		<tr>
			<td>
				<p><?php echo $rowsComp['id'];?></p>
			</td>
			<td>
				<a href="computer.php?id=<?php echo $rowsComp['id']; ?>">
					<h4><?php echo $rowsComp['make']; ?> , <?php echo $rowsComp['model']; ?></h4>
				</a>
			</td>
			<td>
				<form action="updateProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsComp['id']; ?>" hidden/>
					<input type="text" name="products" value="computers" hidden/>
					<input type="submit" name="submit" value="UPDATE"/>
				</form>
				<form action="deleteProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsComp['id']; ?>" hidden/>
					<input type="text" name="products" value="computers" hidden/>
					<input type="submit" name="submit" value="DELETE"/>
				</form>
			</td>
		</tr>
		<?php
			}
		?>			
	</table>
	<br/>
	<br/>
	<h2>Printers</h2>
	
	<table border=1>
		<tr>
			<th width="30px;">ID</th>
			<th width="400px;">Make and Model</th>
			<th width="100px;">Operations</th>
		</tr>
		<?php 
			for($i=0; $i<$rowsNumPrinters; $i++){
			$rowsPrinters = mysqli_fetch_array($resultPrinters);
		?>
		<tr>
			<td>
				<p><?php echo $rowsPrinters['id'];?></p>
			</td>
			<td>
				<a href="printer.php?id=<?php echo $rowsPrinters['id']; ?>">
					<h4><?php echo $rowsPrinters['make']; ?> , <?php echo $rowsPrinters['model']; ?></h4>
				</a>
			</td>
			<td>
				<form action="updateProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsPrinters['id']; ?>" hidden/>
					<input type="text" name="products" value="printers" hidden/>
					<input type="submit" name="submit" value="UPDATE"/>
				</form>
				<form action="deleteProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsPrinters['id']; ?>" hidden/>
					<input type="text" name="products" value="printers" hidden/>
					<input type="submit" name="submit" value="DELETE"/>
				</form>
			</td>
		</tr>
		<?php
			}
		?>			
	</table>
	<br/>
	<br/>
	<h2>Routers</h2>
	
	<table border=1>
		<tr>
			<th width="30px;">ID</th>
			<th width="400px;">Make and Model</th>
			<th width="100px;">Operations</th>
		</tr>
		<?php 
			for($i=0; $i<$rowsNumRouters; $i++){
			$rowsRouters = mysqli_fetch_array($resultRouters);
		?>
		<tr>
			<td>
				<p><?php echo $rowsRouters['id'];?></p>
			</td>
			<td>
				<a href="router.php?id=<?php echo $rowsRouters['id']; ?>">
					<h4><?php echo $rowsRouters['make']; ?> , <?php echo $rowsRouters['model']; ?>  </h4>
				</a>
			</td>
			<td>
				<form action="updateProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsRouters['id']; ?>" hidden/>
					<input type="text" name="products" value="routers" hidden/>
					<input type="submit" name="submit" value="UPDATE"/>
				</form>
				<form action="deleteProductInDb.php" method="get">
					<input type="text" name="id" value="<?php echo $rowsRouters['id']; ?>" hidden/>
					<input type="text" name="products" value="routers" hidden/>
					<input type="submit" name="submit" value="DELETE"/>
				</form>
			</td>
		</tr>
		<?php
			}
		?>			
	</table>

</div>
<?php
}
else {?>
	<h1>LOGIN</h1>
	<form action="login/login.php" method="post">
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
include('templates/footer.php'); 
?>