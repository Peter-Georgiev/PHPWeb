<?php
declare(strict_types = 1);
(array)$data = [];

(string)$readLine = fgets(STDIN);

(array)$split = explode(',', $readLine);
(string)$towns = '';

for ((int)$i = 0; $i < count($split); $i++){

    if ($i % 2 == 0){
        $towns = trim($split[$i]);
        if (!array_key_exists($towns, $data)){
            $data[$towns] = 0;
        }
    } else {
        $data[$towns] += intval(trim($split[$i]));
        $towns = '';
    }
}

printResult($data);

function printResult(array $data){
    echo '[';
    (int)$index = 0;
    foreach ($data as $k => $v) {
        (string)$message = "\"$k\" => \"$v\"";
        if ($index < count($data) - 1) {
            $message .= ', ';
        }
        $index++;
        echo $message;
    }
    echo ']';
}