<?php 
	require ('shape.php');
	
	$shape = new Shape();
	
	$shape->setPoints(5, 45);
	$shape->setPoints(55, 145);
	$shape->setPoints(45, 85);
	$shape->setPoints(56, 10);
	$shape->setPoints(45, 15);
	$shape->setPoints(56, 10);
	$shape->setPoints(39, 87);
	$shape->setPoints(17, 46);
	
	
	$shape->drawAndMoveShape(20);
	$shape->displayImage();
