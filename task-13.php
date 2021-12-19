<?php
$a = 233;
$b = 718;
if ($a >= 0 and $b >= 0) {
    echo abs($a - $b).'<br>';
} else if ($a < 0 and $b < 0) {
    echo $a * $b.'<br>';
} else {
    echo $a + $b .'<br>';
}

$a = 8;
switch ($a){
    case 1:
        echo 1 .', ';
    case 2:
        echo 2 .', ';
    case 3:
        echo 3 .', ';
    case 4:
        echo 4 .', ';
    case 5:
        echo 5 .', ';
    case 6:
        echo 6 .', ';
    case 7:
        echo 7 .', ';
    case 8:
        echo 8 .', ';
    case 9:
        echo 9 .', ';
    case 10:
        echo 10 .', ';
    case 11:
        echo 11 .', ';
    case 12:
        echo 12 .', ';
    case 13:
        echo 13 .', ';
    case 14:
        echo 14 .', ';
    case 15:
        echo 15 .'.' . '<br>';
        break;
    default:
        echo 'default';
}

$result = match ($a) {
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
    7 => 7,
    8 => 8,
    9 => 9,
    10 => 10,
    11 => 11,
    12 => 12,
    13 => 13,
    14 => 14,
    15 => 15,
    default => 0.0
};
echo $result;