<?php 
//������ #5:
//�� �� ������� �������, ����� ������ ���� ��������� - ����� � ����� �������� - �����, �������� ASCII �������� �� �������. �����: http://php.net/manual/en/function.ord.php
//�������� ���������: $result = asciiSymbols("Hello");
//�������� �����: array(72, 101, 108, 108, 111)

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