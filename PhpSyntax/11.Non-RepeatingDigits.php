<?php

$number = intval(trim(fgets(STDIN), ' '));

$hasNonRepeating = false;
$nonRepeating = array();

for ($i = 100; $i <= $number; $i++) {

    if (strlen((string)$i) > 3) {
        break;
    }

    $firstDigit = (int)($i % 10);
    $secondDigit = (int)($i / 10) % 10;
    $thirdDigit = (int)($i / 100);

    if ($firstDigit != $secondDigit && $secondDigit != $thirdDigit && $firstDigit != $thirdDigit) {
        array_push($nonRepeating, $i);
        $hasNonRepeating = true;
    }
}
printResult($hasNonRepeating, $nonRepeating);

function printResult($hasNonRepeating, $nonRepeating){
    if ($hasNonRepeating) {
        echo implode(', ', $nonRepeating);
    } else {
        echo 'no';
    }
}
