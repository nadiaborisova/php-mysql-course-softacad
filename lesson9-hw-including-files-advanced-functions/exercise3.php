<?php 
//������ #3:
//�� �� ������� �������, ����� ����� ������ �� ������������ �� �������� ��� ������. ��������� �� ������ � a * b. �� �� ����� ��������, � ��� ����� �� �������� �� � ����������� ����� �� �� ����� �������� 0.
//�������� ��������� #1: echo rectangleArea(2,3);
//�������� ����� #1: 6
//�������� ��������� #2: echo rectangleArea(10,5);
//�������� ����� #2: 50
//�������� ��������� #3: echo rectangleArea(-2,3);
//�������� ����� #3: 0
//�������� ��������� #4: echo rectangleArea(2,-3);
//�������� ����� #4: 0
//�������� ��������� #5: echo rectangleArea(-2,-3);
//�������� ����� #5: 0

function rectangleArea ($a, $b){
	$area = 0;
	if ($a<0 || $b<0) {
		$area = 0;
	}
	else{
		$area = $a*$b;
	}
	return $area;
}

echo rectangleArea(2,3)."<br/>";
echo rectangleArea(10,5)."<br/>";
echo rectangleArea(-2,3)."<br/>";
echo rectangleArea(2,-3)."<br/>";
echo rectangleArea(-2,-3);

?>