<?php 
	require ('shape.php');
	
	$myShape = new Shape;
	
	echo "Shape methods: </br>";
	$myShape->setPoints(5, 45);
	$myShape->setPoints(55, 145);
	$myShape->setPoints(45, 85);
	$myShape->setPoints(56, 10);
	$myShape->setPoints(45, 15);
	$myShape->setPoints(56, 10);
	$myShape->setPoints(39, 87);
	$myShape->setPoints(17, 46);
	
	echo "My points are:";
	var_dump($myShape->getPoints());
	
	echo "The perimeter of my shape is: ".$myShape->calcPerimeter()."<br/>";
	
	$myShape->modifyPointOnIndex(12, 13, 3);	
	echo "I just modified points of index 3! Now the point on index 3 has coordinates as follows: ";
	var_dump($myShape->getPointOnIndex(3));
	
	$myShape->deletePointOnIndex(2);	
	echo "I just delete a point of index 2!";
	echo "Now my points are:";
	var_dump($myShape->getPoints());
