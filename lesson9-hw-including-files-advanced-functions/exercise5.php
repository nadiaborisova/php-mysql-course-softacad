<?php 
//Задача #5:
//Да се състави функция, която приема един параметър - текст и връща резултат - масив, съдържащ ASCII кодовете на буквите. Помощ: http://php.net/manual/en/function.ord.php
//Примерно извикване: $result = asciiSymbols("Hello");
//Примерен изход: array(72, 101, 108, 108, 111)

function asciiSymbols ($text){
	$result = [];
	$arr = str_split($text);
	for ($i=0; $i<count($arr); $i++){
		$result[$i] = (ord($arr[$i]));
		
	}
	var_dump($result);
}
$text = "Hello";
asciiSymbols ($text);

?>