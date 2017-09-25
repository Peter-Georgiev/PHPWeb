<?php
declare(strict_types = 1);

$readLine = trim(fgets(STDIN));

while (getAverage($readLine) < 5) {
    $readLine .= '9';
}

echo $readLine;

function getAverage($num )
{
    $average = 0;

    for ($i = 0; $i < strlen($num); $i++) {
        $average += $num[$i];
    }
    $average /= strlen($num);
    return $average;
}

