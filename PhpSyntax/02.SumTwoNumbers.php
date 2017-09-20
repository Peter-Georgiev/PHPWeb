<?php
error_reporting(E_ALL ^E_NOTICE);
$firstNumber = doubleval(trim(fgets(STDIN)));
$secondNumber = doubleval(trim(fgets(STDIN)));

$sum = $firstNumber + $secondNumber;

echo number_format($sum, 2, '.','');