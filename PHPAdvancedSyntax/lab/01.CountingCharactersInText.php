<?php
declare(strict_types = 1);

(string) $readLine = fgets(STDIN);

$letters = [];
(string) $text = strtolower($readLine);

for ((int)$i = 0; $i < strlen($text); $i++) {
    (string)$char = $text[$i];
    if ($char == ' '){
        continue;
    }

    if (isset($letters[$char])) {
        $letters[$char]++;
    } else {
        $letters[$char] = 1;
    }
}

printResult($letters);

function printResult(array $letters){
    (int) $index = 0;
    foreach ($letters as $key => $value) {
        (string) $messages = '';

        if ($index  == 0){
            $messages .= '[';
        }

        $messages .= "\"$key\" => \"$value\"";

        if ($index < count($letters) - 1){
            $messages .= ', ';
        } else {
            $messages .= ']';
        }

        $index++;
        echo $messages;
    }
}