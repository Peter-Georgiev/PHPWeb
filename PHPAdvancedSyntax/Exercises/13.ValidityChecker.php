<?php
declare(strict_types = 1);

$arr = explode(", ", trim(fgets(STDIN)));

$x1 = $arr[0];
$y1 = $arr[1];
$x2 = $arr[2];
$y2 = $arr[3];

$startX = 0;
$startY = 0;

printMessage($x1, $y1, $startX, $startY);
printMessage($x2, $y2, $startX, $startY);
printMessage($x1, $y1, $x2, $y2);


function isDistanceValid($x1, $y1, $x2, $y2){
    $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    if ($distance == intval($distance)) {
        return true;
    }

    return false;
}

function printMessage($x1, $y1, $x2, $y2){
    if (isDistanceValid($x1, $y1, $x2, $y2)) {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid\n";
    } else {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid\n";
    }
}