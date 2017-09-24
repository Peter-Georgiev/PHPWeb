<?php
declare(strict_types = 1);

$arr = explode(' ', trim(fgets(STDIN)));

$arr = floatValue($arr);

$prn = searchEqual($arr);

printResult($prn, $arr);

function searchEqual($arr)
{
    $lastIndex = 0;
    $maxCount = 0;

    for ($i = 0; $i < count($arr); $i++) {
        $count = 0;
        $indexPrevious = $i - 1;
        if ($indexPrevious < 0) {
            continue;
        }

        for ($j = $i; $j < count($arr); $j++) {
            $firstElement = $arr[$indexPrevious];
            $indexPrevious++;
            $secondElement = $arr[$j];

            if ($firstElement < $secondElement) {
                $count++;
            } else {
                break;
            }

            if ($count > $maxCount) {
                $maxCount = $count;
                $lastIndex = $j;
            }
        }
    }

    $prn = array('$lastIndex' => $lastIndex, 'maxCount' => $maxCount + 1);
    return $prn;
}

function printResult($prn, $arr)
{
    $maxCount = $prn['maxCount'];
    $lastIndex = $prn['$lastIndex']  - $maxCount + 1;

    $prnElement = array_slice($arr, $lastIndex, $maxCount );

    foreach ($prnElement as $p){
        echo "$p ";
    }
}

function floatValue($arr)
{
    $floatArr = [];

    foreach ($arr as $value) {
        $floatArr[] = floatval($value);
    }

    return $floatArr;
}