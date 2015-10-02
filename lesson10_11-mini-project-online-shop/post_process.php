<?php 
	include('header.php'); 
	include('menu.php'); 
	$message = '';
	foreach ($_POST as $key => $value)
	{
		$message = $message.$key.'=>'.$value."\n\n";
	}
	file_put_contents('post-'.date('dmYHis').'.txt', $message);
?>
<div id="content">
	<h2>Message sent</h2>
	<p>Your message was sent successfully! Thank you!</p>
	<h3><a href="index.php">HOME</a>
</div>

<?php include('footer.php'); ?>