<?php
/* Problem 01.	Sum Two Numbers */
declare(strict_types = 1);

$a = floatval(trim(fgets(STDIN)));
$b = floatval(trim(fgets(STDIN)));

$sumTwo = function(float $a, float $b){
    return $a + $b;
}; // anonymous function

echo $sumTwo($a, $b);