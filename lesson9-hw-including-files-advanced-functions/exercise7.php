<?php 
//������ #7:
//�� �� ������� �������, ����� ������ 3 ���������� � ����� �������� - ������-������������� �� ����� �����. �������: (a + b + c) / 3
//�������� ���������: meanNumber(2,3,10)
//�������� �����: 5


function meanNumber ($a, $b, $c){
	$result = ($a + $b + $c)/3;
	return $result;
}

$res = meanNumber(2,3,10);
echo $res;


?>