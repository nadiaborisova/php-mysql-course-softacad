<?php
//Задача 3
//Да се генерират две числа и да се изведат в HTML таблица (1ред, N клетки) всички числа от по-малкото до по-голямото.

function generateNums ($a, $b){
echo "<table border=1><tr>";
	for ($i=$a; $i<=$b; $i++){
	echo "<td>".$i."</td>";
	}
echo "</tr></table>";
}
generateNums(12, 15);
?>