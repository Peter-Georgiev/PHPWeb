<?php
//error_reporting(E_ALL ^E_NOTICE);
$operation = $argv[1];

$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));

if ($numberOne == "sum"){
    echo " == " . ($numberOne + $numberTwo);
} else if ($operation  == "subtract"){
    echo  " == " . ($numberOne - $numberTwo);
} else {
    echo "== Wrong operation supplied";
}