<?php
declare(strict_types = 1);

(string) $readLine = trim(fgets(STDIN));

$letters = [];

for ((int)$i = 0; $i < strlen($readLine); $i++) {
    (string)$char = $readLine[$i];

    if (!array_key_exists($char, $letters)) {
        $letters[$char] = 0;
    }
        $letters[$char]++;
}

printResult($letters);

function printResult(array $letters){

    foreach ($letters as $key => $value) {
        echo $key . ' -> ' . $value . "\n";
    }
}