<?php
//Задача 9*
//Да се генерира произволно цяло, положително число и да се определи дали е просто.
//(Простите числа се делят САМО на 1 и на себе си)

function primeNums($num)
{
    $x = sqrt($num);
    $x = floor($x);
    for ( $i = 2 ; $i <= $x ; $i++ ) {
        if ( $num % $i == 0 ) {
            break;
        }
    }
    if( $x == $i-1 ) {
        echo $num." is a prime number!";
    } else {
        echo $num." is not a prime number!";
    }
}

primeNums (7);
	
	
?>