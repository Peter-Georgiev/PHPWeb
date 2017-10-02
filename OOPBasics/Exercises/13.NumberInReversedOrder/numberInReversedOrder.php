<?php
declare(strict_types=1);
include "DecimalNumber.php";

$number = trim(fgets(STDIN));

$reversedOrder = new DecimalNumber($number);

echo $reversedOrder;