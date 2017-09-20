<?php
error_reporting(E_ALL ^E_NOTICE);

$arr = explode(' ', trim(fgets(STDIN)));

$number = 0;
$max = -1;
for ($i = 0; $i < count($arr); $i++) {
    $count = 0;

    for ($j = $i; $j < count($arr); $j++) {
        if ($arr[$i] === $arr[$j]) {
            $count++;
        } else {
            break;
        }

        if ($count > $max) {
            $max = $count;
            $number = $arr[$j];
        }
    }
}

$print = [];
for ($i = 0; $i < $max; $i++){
    echo $number;
    if ($i < $max - 1){
        echo ' ';
    }
}