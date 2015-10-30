<?php 

	require ('triangle.php');

	$myTriangle = new Triangle;
	$myTriangle->setX1(10);
	$myTriangle->setY1(25);	
	$myTriangle->setX2(45);
	$myTriangle->setY2(75);
	$myTriangle->setX3(32);
	$myTriangle->setY3(115);
	
	echo "Triangle methods: </br>";
	echo "Area: ".$myTriangle -> calcArea();

