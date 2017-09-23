<?php
declare(strict_types = 1);
$num = intval(trim(fgets(STDIN)));

while (calcAverage($num) <= 5) {
    $num = addNine($num);
}

echo $num;

function calcAverage($num) {
    $result = $num;
    $sum = 0;
    $count = 0;
    while ($result > 0) {
        $sum += $result % 10;
        $result = ($result - $result % 10) / 10;
        $count++;
    }
    return $sum / $count;
}

function addNine($num) {
    return $num * 10 + 9;
}

