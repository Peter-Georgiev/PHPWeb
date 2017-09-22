<?php
declare(strict_types = 1);

(string)$readLine = trim(fgets(STDIN));
(array)$arr = explode(', ', $readLine);

echo printResult($arr);

function printResult(array $arr){
    (string)$message = '';
    if (count($arr) > 2){
        $x = (float)$arr[0];
        $y = (float)$arr[1];
        $z = (float)$arr[2];

        if (isVolume($x, $y, $z)){
            $message .= 'inside';
        } else {
            $message .= 'outside';
        }
    } else {
        $message .= 'Error: input!';
    }
    return $message;
}

function isVolume(float $x, float $y, float $z){
    $x1 = 10; $x2 = 50;
    $y1 = 20; $y2 = 80;
    $z1 = 15; $z2 = 50;

    if ($x >= $x1 && $x <= $x2){
        if ($y >= $y1 && $y <= $y2){
            if ($z >= $z1 && $z <= $z2){
                return true;
            }
        }
    }

    return false;
}