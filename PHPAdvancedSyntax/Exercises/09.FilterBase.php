<?php
declare(strict_types = 1);

$data = [];
(string)$readLine = '';
while ('filter base' != $readLine = trim(fgets(STDIN))){
    addedUser($readLine, $data);
}

$readLine = trim(fgets(STDIN));

switch ($readLine){
    case 'Age':
        printAge($data);
        break;
    case 'Salary':
        printSalary($data);
        break;
    case 'Position':
        printPosition($data);
        break;
    default:
        //echo 'Not a Valid Input';
        break;
}

function addedUser($readLine, &$data){
    preg_match("/^(.+?)\s*->\s*([0-9]+)$/", $readLine, $regex);
    if (count($regex) == 3){
        if (!array_key_exists($regex[1], $data)){
            $data[$regex[1]]['name'] = $regex[1];
        }
        $data[$regex[1]]['age'] = intval($regex[2]);
        return;
    }

    preg_match("/^(.+?)\s*->\s*([0-9]+.[0-9]+)$/", $readLine, $regex);
    if (count($regex) == 3){
        if (!array_key_exists($regex[1], $data)){
            $data[$regex[1]]['name'] = $regex[1];
        }
        $data[$regex[1]]['salary'] = floatval($regex[2]);
        return;
    }

    preg_match("/^(.+?)\s*->\s*([^0-9]+)$/", $readLine, $regex);
    if (count($regex) == 3){
        if (!array_key_exists($regex[1], $data)){
            $data[$regex[1]]['name'] = $regex[1];
        }
        $data[$regex[1]]['position'] = $regex[2];
        return;
    }
}

function printPosition($data){
    foreach ($data as $kvp) {
        if (!array_key_exists('position', $kvp)){
            continue;
        }
        $position = $kvp['position'];
        $name = $kvp['name'];
        echo "Name: $name\n\rPosition: $position\n\r";
        echo "====================\n\r";
    }
}

function printSalary($data){
    foreach ($data as $kvp) {
        if (!array_key_exists('salary', $kvp)){
            continue;
        }
        $salary = $kvp['salary'];
        $name = $kvp['name'];
        echo "Name: $name\n\rSalary: $salary\n\r";
        echo "====================\n\r";
    }
}

function printAge($data){
    foreach ($data as $kvp) {
        if (!array_key_exists('age', $kvp)){
            continue;
        }
        $age = $kvp['age'];
        $name = $kvp['name'];
        echo "Name: $name\n\rAge: $age\n\r";
        echo "====================\n\r";
    }
}