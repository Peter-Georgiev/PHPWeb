<?php
declare(strict_types=1);

(string)$readLine = trim(fgets(STDIN));
(array)$arr = explode(', ', $readLine);

$inputNum = count($arr);

for ((int)$i = 0; $i < $inputNum; $i += 3) {
    $x = floatval($arr[$i]);
    $y = floatval($arr[$i + 1]);
    $z = floatval($arr[$i + 2]);

    if (isVolume($x, $y, $z)) {
        echo "inside\n";
    } else {
        echo "outside\n";
    }
}

function isVolume(float $x, float $y, float $z)
{
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;

    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }

    return false;
}