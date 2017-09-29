<?php
declare(strict_types=1);
include "Math.php";
use SoftUni\Oop\Math;

$math = new Math(2, 3);

echo $math->getMathSum() . "\n";

$math = new Math(1, 2);

echo $math->getMathDiv();