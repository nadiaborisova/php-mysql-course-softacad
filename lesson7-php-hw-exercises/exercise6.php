<?php
/*Задача 6
По генерирано числоN, да се изведе в HTML таблица по следния начин:
N = 1 
1
0

N = 2 
2
11
33

N =3 
3
222
444
666

N = 4
4
3333
5555
7777
9999*/

function generateNumbers($n){
	$res=$n-1;
	echo "<table border=1><tr><td>".$n."</td></tr>";
	for ($i=0; $i<$n; $i++){
		echo "<tr><td>";
		for ($j=0; $j<$n; $j++){
			echo $res;
		}
		echo "</td></tr>";
		$res+=2;
	}
}
generateNumbers(5);

?>