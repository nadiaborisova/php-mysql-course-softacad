<?php
	include ('lion.php');
	include ('connect.php');	
	
	for($i=1; $i<=4; $i++){
	
		$result = mysqli_query($link, "SELECT * FROM lions WHERE id=".$i);
		$rowsNum = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		$obj ='lion'.$i;
		
		$obj = new Lion;
		
		$obj->setName($row['name']);
		$obj->getName();
		
		
		$obj->setDateOfBirth($row['dateOfBirth']);
		$obj->getDateOfBirth();
		
		$obj->lastFeeding = $row['lastFeeding'];
		
		$obj -> sayName();
		$obj -> sayDob();
		$obj -> sayAge();
		$obj -> cry();
		
		$obj -> sayLastFeedingPeriod();

		$obj -> feeding();
	}