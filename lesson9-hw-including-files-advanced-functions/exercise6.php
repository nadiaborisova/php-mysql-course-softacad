<?php 

//Задача #6:
//Да се състави функция, която приема един параметър - масив, съдържащ ASCII кодовете на буквите И връща резултат - текстът от тях (обратното на условието от задача 5). Помощ: http://php.net/manual/en/function.chr.php
//Примерно извикване: asciiSymbols(array(72, 101, 108, 108, 111));
//Примерен изход: Hello

function asciiSymbols ($arr) {
	$text = [];
	for ($i=0; $i<count($arr); $i++){
		$text[$i] = chr($arr[$i]);
		echo $text[$i];
	}
}

asciiSymbols (array(72, 101, 108, 108, 111));


?>