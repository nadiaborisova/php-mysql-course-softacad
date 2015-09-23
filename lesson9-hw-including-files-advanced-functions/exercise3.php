<?php 
//Задача #3:
//Да се създаде функция, която смята лицето на правоъгълник по зададени две страни. Формулата за лицето е a * b. Да се прави проверка, и ако някоя от страните ни е отрицателно число да ни връща резултат 0.
//Примерно извикване #1: echo rectangleArea(2,3);
//Примерен изход #1: 6
//Примерно извикване #2: echo rectangleArea(10,5);
//Примерен изход #2: 50
//Примерно извикване #3: echo rectangleArea(-2,3);
//Примерен изход #3: 0
//Примерно извикване #4: echo rectangleArea(2,-3);
//Примерен изход #4: 0
//Примерно извикване #5: echo rectangleArea(-2,-3);
//Примерен изход #5: 0

function rectangleArea ($a, $b){
	$area = 0;
	if ($a<0 || $b<0) {
		$area = 0;
	}
	else{
		$area = $a*$b;
	}
	return $area;
}

echo rectangleArea(2,3)."<br/>";
echo rectangleArea(10,5)."<br/>";
echo rectangleArea(-2,3)."<br/>";
echo rectangleArea(2,-3)."<br/>";
echo rectangleArea(-2,-3);

?>