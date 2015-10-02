<?php /*
	include('database.php'); 
	$page_id = $_GET['pg'];	
	include('header.php'); 
	include('menu.php'); ?>
<div id="homepage">
	<p><?php echo $pages[$page_id]; ?> </p>
	<br/><br/>
</div>
<?php include('footer.php'); ?>*/


	$page_id = $_GET['pid'];	
	$content = file_get_contents($page_id.'.txt');
	include('header.php'); 
	include('menu.php'); ?>
<div id="content">
	<p><?php echo $content; ?> </p>
	<br/><br/>
</div>
<?php include('footer.php'); ?>