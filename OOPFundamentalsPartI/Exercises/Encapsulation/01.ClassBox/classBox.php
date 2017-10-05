<?php
declare(strict_types=1);
include "Box.php";

$numbers = [];
for ($i = 0; $i < 3; $i++) {
    $numbers[] = floatval(fgets(STDIN));
}

$box = new Box($numbers[0], $numbers[1], $numbers[2]);

echo $box;