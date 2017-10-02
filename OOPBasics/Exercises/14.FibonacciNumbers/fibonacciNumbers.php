<?php
declare(strict_types=1);
include "Fibonacci.php";

$start = intval(fgets(STDIN));

$end = intval(fgets(STDIN));

$numberFib = new Fibonacci($start, $end);

echo implode(', ', $numberFib->getFibonacciSequence());