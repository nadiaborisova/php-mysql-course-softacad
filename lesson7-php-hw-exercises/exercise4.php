<?php
//Задача 4
//Да се генерира число и да се изведе сбора между всички числа между 1 и генерираното число, включително.
//Пример: При генерирано число 8 резултатът трябва да е 36

function generateSumOfNums($a){
	$sum=0;
	for ($i=1; $i<=$a; $i++){
		$sum += $i;
	}
	return $sum;
}
$result = generateSumOfNums(8);
echo "The sum is: ".$result;

?>