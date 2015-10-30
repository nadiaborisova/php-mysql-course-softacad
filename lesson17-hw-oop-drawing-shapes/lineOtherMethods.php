<?php 
	require ('line.php');
	
	$myLine = new Line;
	$myLine->setX1(10);
	$myLine->setY1(25);	
	$myLine->setX2(45);
	$myLine->setY2(75);
	
	echo "Line methods: </br>";
	echo "Distance: ".$myLine -> calcDistance();

