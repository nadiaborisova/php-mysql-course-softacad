<?php 

//������ #6:
//�� �� ������� �������, ����� ������ ���� ��������� - �����, �������� ASCII �������� �� ������� � ����� �������� - ������� �� ��� (��������� �� ��������� �� ������ 5). �����: http://php.net/manual/en/function.chr.php
//�������� ���������: asciiSymbols(array(72, 101, 108, 108, 111));
//�������� �����: Hello

function asciiSymbols ($arr) {
	$text = [];
	for ($i=0; $i<count($arr); $i++){
		$text[$i] = chr($arr[$i]);
		echo $text[$i];
	}
}

asciiSymbols (array(72, 101, 108, 108, 111));


?>