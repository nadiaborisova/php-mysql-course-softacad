<?php
	$link=mysqli_connect('localhost', 'root', '');
	if(!$link){
		die('Could not connect:'. mysqli_error($link));
	}
	//echo 'Connected successfully <br/>';
	
	$selectedDb=mysqli_select_db($link,'holiday_shop_stat');
	if(!$selectedDb){
		die('Cannot select DB :'. mysqli_error($link));
	}
	else{
		//echo 'Database selected successfully';
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d H:i:s");
	$page = $_SERVER['PHP_SELF'];
	mysqli_query($link, "INSERT INTO `log`(`ip_address`,`date`,`page_visited`) VALUES ('$ip','$date','$page')");
	