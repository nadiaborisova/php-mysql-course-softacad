<?php 
//������ #8:
//�� �� ������� �������, ����� ������ 1 ��������� - ����� � ����� �������� - ������-������������� �� ������ �����. �������: (a + b + c + ...) / ���� �����
//�������� ���������: meanNumber(array(2,3,10,15,10))
//�������� �����: 8

function meanNumber ($arr) {
	$sum = 0;
	for ($i=0; $i<count($arr); $i++){
		$sum += $arr[$i];
	}
	$result = $sum / count($arr);
	return $result;
}
$res = meanNumber (array(2,3,10,15,10));
echo $res;

?>