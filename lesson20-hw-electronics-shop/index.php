<?php 
	include('templates/header.php'); 
	include('templates/menu.php'); 
	
	if(isset($_SESSION['login_user'])) {
	?>
		<div align="left">Hello, <?php echo $_SESSION['login_user']?> ||| <a href="login/logout.php"> Logout</a></div>
	<?php
	}
?>
<div id="content" align="center">
	<div class="content-header-basket">
		<a href="basket.php">
			<span>My basket</span><br/>
			<img src="images/basket-img.jpg"/>
		</a>
	</div>
		<h1>WELCOME TO OUR ELECTRONICS SHOP!</h1>
	<div class="clear-float"></div>
	<div class='item'>
		<a href="computers.php">
			<h3>COMPUTERS</h3>
			<img src="images/computer.jpg"/>
		</a>
	</div>
	<div class='item'>
		<a href="printers.php">
			<h3>PRINTERS</h3>
			<img src="images/printer.jpg"/>
		</a>
	</div>
	<div class='item'>
		<a href="routers.php">
			<h3>ROUTERS</h3>
			<img src="images/router.jpg"/>
		</a>
	</div>
</div>
<div class="clear-float">
<?php 
	include('templates/footer.php'); 
?>
