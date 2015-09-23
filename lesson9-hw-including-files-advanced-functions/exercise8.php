<?php 
//Задача #8:
//Да се състави функция, която приема 1 параметър - масив и връща резултат - средно-аритметичното от всички числа. Формула: (a + b + c + ...) / броя числа
//Примерно извикване: meanNumber(array(2,3,10,15,10))
//Примерен изход: 8

function meanNumber ($arr) {
	$sum = 0;
	for ($i=0; $i<count($arr); $i++){
		$sum += $arr[$i];
	}
	$result = $sum / count($arr);
	return $result;
}
$res = meanNumber (array(2,3,10,15,10));
echo $res;

?>