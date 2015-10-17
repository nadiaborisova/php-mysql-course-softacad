<?php
	$link=mysqli_connect('localhost', 'root', '');
	if(!$link){
		die('Could not connect:'. mysqli_error($link));
	}
	//echo 'Connected successfully <br/>';
	
	$selectedDb=mysqli_select_db($link,'login_form');
	if(!$selectedDb){
		die('Cannot select DB :'. mysqli_error($link));
	}
	else{
		//echo 'Database selected successfully';
	}
