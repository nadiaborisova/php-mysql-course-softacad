<?php
//Задача 1
//Да се изведат във HTML таблица всички нечетни числа от -10 до 10.
echo "<strong>Solution 1</strong>";
echo "<table border=1><tr>";
for ($i=-9; $i<11; $i+=2){
echo "<td>".$i."</td>";
}
echo "</tr></table>";

echo "<strong>Solution 2</strong>";
echo "<table border=1><tr>";
for ($i=-10; $i<11; $i++){
	if($i%2==0) {
		continue;}
		else {
		echo "<td>".$i."</td>";
		}
}
echo "</tr></table>";

?>