<?php
declare(strict_types = 1);

(string)$readLine = trim(fgets(STDIN));
$arr = explode(' ', $readLine);

$result = [];

for ((int)$i = 0; $i < count($arr); $i++) {

    if (!is_numeric($arr[$i])){
        continue;
    }

    (float)$num = $arr[$i];

    if (!array_key_exists($num, $result)) {
        $result[$num] = 0;
    }
    $result[$num]++;
}

printResult($result);

function printResult(array $result)
{    ksort($result);
    foreach ($result as $key => $value) {
        echo $key . ' -> ' . $value . " times\n";
    }
}