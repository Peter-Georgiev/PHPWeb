<?php
declare(strict_types = 1);
$data = [];

while ('exam time' != $readLine = trim(fgets(STDIN))){
    commandStock($readLine, $data);

    $isExit = $readLine == 'shopping time';
    while ($isExit){
        $readLine = trim(fgets(STDIN));
        if ($readLine == 'exam time'){
            break;
        }
        commandBuy($readLine, $data);
    }

    if ($isExit){
        break;
    }
}

printResult($data);

function commandStock($readLine, &$data){
    preg_match("/(\w+?)\s+(.+)\s+([0-9]+)/", $readLine, $regex);
    if (count($regex) == 0 || $regex[1] != 'stock'){
        return;
    }

    if (!array_key_exists($regex[2], $data)){
        $data[$regex[2]] = intval(0);
    }

    $data[$regex[2]] += intval($regex[3]);
}

function commandBuy($readLine, &$data){
    preg_match("/(\w+?)\s+(.+)\s+([0-9]+)/", $readLine, $regex);
    if (count($regex) == 0 || $regex[1] != 'buy'){
        return;
    }
    if (!array_key_exists($regex[2], $data)){
        echo "$regex[2] doesn't exist\n\r";
        return;
    }

    if ($data[$regex[2]] <= 0){
        echo "$regex[2] out of stock\n\r";
        return;
    }

    if ($data[$regex[2]] - intval($regex[3]) < 0){
        echo $data[$regex[2]];
        return;
    }

    $data[$regex[2]] -= intval($regex[3]);
}

function printResult($data){
    foreach ($data as $key => $value) {
        if ($value <= 0){
            continue;
        }
        echo $key . ' -> ' . $value . "\r\n";
    }
}