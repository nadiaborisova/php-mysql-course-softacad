<?php
//������ 4
//�� �� �������� ����� � �� �� ������ ����� ����� ������ ����� ����� 1 � ������������ �����, �����������.
//������: ��� ���������� ����� 8 ���������� ������ �� � 36

function generateSumOfNums($a){
	$sum=0;
	for ($i=1; $i<=$a; $i++){
		$sum += $i;
	}
	return $sum;
}
$result = generateSumOfNums(8);
echo "The sum is: ".$result;

?>