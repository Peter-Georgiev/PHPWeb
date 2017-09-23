<?php
declare(strict_types = 1);
$data = [];
$unsuccessfulCount = intval(0);
while ('end' != $readLine = trim(fgets(STDIN))){
    addedUsedPass($readLine, $data);

    $isExit = $readLine == 'login';
    while ($isExit){
        $readLine = trim(fgets(STDIN));
        if ($readLine == 'end'){
            break;
        }
        loginUsedPass($readLine, $data, $unsuccessfulCount);
    }

    if ($isExit){
        break;
    }
}

printResult($unsuccessfulCount);

function addedUsedPass($readLine, &$data){
    preg_match("/(\w+)\s*->\s*(.*)/", $readLine, $regex);
    if (count($regex) != 3){
        return;
    }

    if (!array_key_exists($regex[1], $data)){
        $data[$regex[1]] = '';
    }

    $data[$regex[1]] = $regex[2];
}

function loginUsedPass($readLine, &$data, &$unsuccessfulCount){
    preg_match("/(\w+)\s*->\s*(.*)/", $readLine, $regex);
    if (count($regex) != 3){
        return;
    }

    if (!array_key_exists($regex[1], $data)){
        $unsuccessfulCount++;
        echo "$regex[1]: login failed\n\r";
        return;
    }

    if ($data[$regex[1]] != $regex[2]){
        $unsuccessfulCount++;
        echo "$regex[1]: login failed\n\r";
        return;
    }

    if ($data[$regex[1]] == $regex[2]){
        echo "$regex[1]: logged in successfully\n\r";
        return;
    }
}

function printResult($unsuccessfulCount){
    echo "unsuccessful login attempts: $unsuccessfulCount";
}
