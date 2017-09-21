<?php
error_reporting(E_ALL ^E_NOTICE);

$arr = explode(' ', trim(fgets(STDIN)));
//$arr =  explode(' ', '');

$arr = intValue($arr);

$prn = searchEqual($arr);

printResult($prn);

function searchEqual($arr){
    $lastElement = 0;
    $maxCount = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $count = 0;
        $indexPrevious = $i - 1;
        if ($indexPrevious < 0){
            continue;
        }

        for ($j = $i; $j < count($arr); $j++) {
            $firstElement = $arr[$indexPrevious] + 1;
            $indexPrevious++;
            $secondElement = $arr[$j];

            if ($firstElement == $secondElement) {
                $count++;
            } else {
                break;
            }

            if ($count > $maxCount) {
                $maxCount = $count;
                $lastElement = $arr[$j];
            }
        }
    }

    $prn = array('lastElement' => $lastElement - $maxCount, 'maxCount' => $maxCount + 1);
    return $prn;
}

function printResult($prn){
    $lastElement = $prn['lastElement'];
    $maxCount = $prn['maxCount'];

    for ($i = 0; $i < $maxCount; $i++){
        echo $lastElement;
        if ($i < $maxCount - 1){
            echo ' ';
        }
        $lastElement++;
    }
}

function intValue($arr){
    $intArr = [];

    foreach ($arr as $value) {
        $intArr[] = intval($value);
    }

    return $intArr;
}