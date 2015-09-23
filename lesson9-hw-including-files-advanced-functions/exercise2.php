<?php
//������ #2:
//�� �� ������� �������, ����� ����� ������ �� ���� �� ������� ������. ��������� �� ������ � Pi * r * 2. �� �� ����� ��������, � ��� ������� �� � ����������� ����� �� �� ����� �������� 0.
//�������� ��������� #1: echo circleArea(1);
//�������� ����� #1: 6.28
//�������� ��������� #2: echo circleArea(10);
//�������� ����� #2: 62.83
//�������� ��������� #3: echo circleArea(-20);
//�������� ����� #3: 0


function circleArea ($radius){
	$piNum = pi();
	$area = 0;
	if ($radius<0){
		$area = 0;
	}
	else {
		$area = round($piNum*$radius*2, 2);
	}
	return $area;
}

echo circleArea (1);
echo "<br/>";
echo circleArea (10);
echo "<br/>";
echo circleArea (-20);


?>