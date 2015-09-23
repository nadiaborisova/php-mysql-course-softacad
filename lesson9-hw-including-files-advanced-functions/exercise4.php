<?php

//Задача #4:
//Да се създаде функция, която приема масив съдържащ масиви с по 2 елемента и конструира HTML от тях, използващ функцията от задача 1.
//Примерно извикване: $arr = array(array('http://abv.bg/', 'Абв поща'),array('http://gbg.bg/', 'Гювеч.бг'),array('http://google.com/', 'Гугъл'));printLinks($arr);
//Примерен изход: <a href="http://abv.bg/">Абв поща</a><a href="http://gbg.bg/">Гювеч.бг</a><a href="http://google.com/">Гугъл</a>


function printLinks ($arr){
	for($i=0;$i<count($arr);$i++){
		echo '<a href="'.$arr[$i][0].'">'.$arr[$i][1].'</a>'; 
    echo "<br/>";
	}
}

$arr = array(array('http://abv.bg/', 'Абв поща'),array('http://gbg.bg/', 'Гювеч.бг'),array('http://google.com/', 'Гугъл'));printLinks($arr);




?>