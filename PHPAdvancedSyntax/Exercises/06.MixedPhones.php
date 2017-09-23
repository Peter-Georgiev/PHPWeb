<?php
declare(strict_types = 1);
$data = [];

while ('Over' != $readLine = trim(fgets(STDIN))){
    matchNameAndPnone($readLine, $data);
}

printResult($data);

function matchNameAndPnone($readLine, &$data){
    preg_match("/([0-9]+)\s*:\s*(.+)|(.+?)\s*:\s*([0-9]+)/",
        $readLine, $regex);

    if (count($regex) == 3){

        if (!array_key_exists($regex[2], $data)){
            $data[$regex[2]] = $regex[1];
        }
        $data[$regex[2]] = $regex[1];
    }

    if (count($regex) == 5){
        if (!array_key_exists($regex[3], $data)){
            $data[$regex[3]] = $regex[4];
        }
        $data[$regex[3]] = $regex[4];
    }
}

function printResult($data){
    ksort($data);
    foreach ($data as $k => $v) {
        echo $k . ' -> ' . $v . "\n";
    }
}