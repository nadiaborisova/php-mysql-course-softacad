<?php
//Задача #1:
//Да се създаде функция, която приема 2 параметъра - link и име и извежда линк, който сочи към подадения линк и в него пише подадения текст.
//Примерно извикване: printLink('http://abv.bg/', 'Абв поща');
//Примерен изход: <a href="http://abv.bg/">Абв поща</a>

echo "Solution #1:";
function printLink ($link, $name){
	echo @('<a href="'.$link.'">'.$name.'</a>');
}

printLink('http://abv.bg/', 'Абв поща');
echo "<br/>";

echo "Solution #2:";
function printLink2 ($link, $name){
	echo '<a href="'.$link.'">'.$name.'</a>';
}

printLink2('http://abv.bg/', 'Абв поща');

?>