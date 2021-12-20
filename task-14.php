<?php

date_default_timezone_set('Europe/Moscow');

function sum($a, $b)
{
    return $a + $b;
}

echo sum(2, 3) .'<br>';


function subtraction($a, $b)
{
    return $a - $b;
}

echo subtraction(2, 3).'<br>';


function division($a, $b)
{
    return $a / $b;
}

echo division(2, 3).'<br>';

function multiply($a, $b)
{
    return $a * $b;
}

echo multiply(2, 3).'<br>';



function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "sum":
            echo $arg1 + $arg2;
            break;
        case "subtraction":
            echo $arg1 - $arg2;
            break;
        case "division":
            echo $arg1 / $arg2;
            break;
        case "multiply":
            echo $arg1 * $arg2;
            break;
        default:
            echo "the value of $operation is incorrect";
    }
}
echo mathOperation(11, 7, 'sum') .'<br>';



echo date ('Y') .'<br>';




    function power($val, $pow)
    {
        if ($pow == 0) {
            return 1;
        } else if ($pow == 1) {
            return $val;
        } else if ($pow > 1) {
            return $val * power($val, $pow - 1);
        } else {
            return $val ** $pow;
        }
    }
    echo power(8, 2) .'<br>';



function myTime($hour, $minute) {

    switch ($hour % 10) {
        case 1:
            echo "$hour час ";
break;
        case 2:
        case 3:
        case 4:
            echo "$hour часа ";
break;
        default:
            echo "$hour часов ";
            break;
    }
    switch ($minute % 10) {
        case 1:
            echo "$minute минута";
break;
        case 2:
        case 3:
        case 4:
            echo "$minute минуты";
break;
        default:
            echo "$minute минут";
            break;
    }
}
echo myTime(date('H'), date('i'));

