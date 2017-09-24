<?php
declare(strict_types = 1);

$input = explode(', ', trim(fgets(STDIN)));

if ((distance12($input) <= distance13($input)) && (distance13($input) >= distance23($input))){
    $a = distance12($input) + distance23($input);
    echo '1->2->3: ' . $a;
}
else if ((distance12($input) <= distance23($input)) && (distance13($input) < distance23($input))){
    $b = distance13($input) + distance12($input);
    echo '2->1->3: ' . $b;
} else {
    $c = distance23($input) + distance13($input);
    echo '1->3->2: ' . $c;
}

function distance12(array $input){
    $x1 = floatval($input[0]);
    $y1 = floatval($input[1]);
    $x2 = floatval($input[2]);
    $y2 = floatval($input[3]);
     return sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));
}

function distance23(array $input){
    $x2 = floatval($input[2]);
    $y2 = floatval($input[3]);
    $x3 = floatval($input[4]);
    $y3 = floatval($input[5]);
    return sqrt(pow(($x3 - $x2), 2) + pow(($y3 - $y2), 2));
}

function distance13(array $input){
    $x1 = floatval($input[0]);
    $y1 = floatval($input[1]);
    $x3 = floatval($input[4]);
    $y3 = floatval($input[5]);
    return sqrt(pow(($x3 - $x1), 2) + pow(($y3 - $y1), 2));
}