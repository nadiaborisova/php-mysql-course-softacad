<?php 
	require ('line.php');
	
	$line = new Line;
	$line->setX1(10);
	$line->setY1(25);	
	$line->setX2(45);
	$line->setY2(75);
	$line->drawAndMoveLine(10);
	$line->displayImage();
