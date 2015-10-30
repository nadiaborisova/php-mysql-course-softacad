<?php 
	require ('triangle.php');
	
	$triangle = new Triangle;
	$triangle->setX1(10);
	$triangle->setY1(25);	
	$triangle->setX2(45);
	$triangle->setY2(75);
	$triangle->setX3(32);
	$triangle->setY3(115);
	$triangle->drawAndMoveTriangle(15);
	$triangle->displayImage();