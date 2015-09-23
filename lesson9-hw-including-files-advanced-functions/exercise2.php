<?php
//Задача #2:
//Да се създаде функция, която смята лицето на кръг по зададен радиус. Формулата за лицето е Pi * r * 2. Да се прави проверка, и ако радиуса ни е отрицателно число да ни връща резултат 0.
//Примерно извикване #1: echo circleArea(1);
//Примерен изход #1: 6.28
//Примерно извикване #2: echo circleArea(10);
//Примерен изход #2: 62.83
//Примерно извикване #3: echo circleArea(-20);
//Примерен изход #3: 0


function circleArea ($radius){
	$piNum = pi();
	$area = 0;
	if ($radius<0){
		$area = 0;
	}
	else {
		$area = round($piNum*$radius*2, 2);
	}
	return $area;
}

echo circleArea (1);
echo "<br/>";
echo circleArea (10);
echo "<br/>";
echo circleArea (-20);


?>