<?php
	include ('lion.php');
	include ('connect.php');	
	
		$result = mysqli_query($link, "SELECT * FROM lions");
		$rowsNum = mysqli_num_rows($result);
	
	for($i=1; $i<=4; $i++){
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