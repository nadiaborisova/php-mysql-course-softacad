<?php
//������ 3
//�� �� ��������� ��� ����� � �� �� ������� � HTML ������� (1���, N ������) ������ ����� �� ��-������� �� ��-��������.

function generateNums ($a, $b){
echo "<table border=1><tr>";
	for ($i=$a; $i<=$b; $i++){
	echo "<td>".$i."</td>";
	}
echo "</tr></table>";
}
generateNums(12, 15);
?>