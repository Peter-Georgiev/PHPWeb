<?php
$line = trim(fgets(STDIN));

$letters = [];
for ($i = 0; $i < strlen($line); $i++) {
    $letter = trim($line[$i]);

    if ($letter == ""){
        continue;
    }

    if (!array_key_exists($letter, $letters)){
        $letters[$letter] = 0;
    }

    $letters[$letter]++;
}

arsort($letters);

foreach ($letters as $key => $value) {
    echo $key . " -> " . $value . "\n\r";
}