<?php
declare(strict_types = 1);

$input =[];
//$input = ['21', 'residential'];
for ((int)$i = 0; $i < 2; $i++){
    $input[] = trim(fgets(STDIN));
}
$speed = floatval($input[0]);

$limit = getLimit($input);
$infraction = getInfraction($speed, $limit);
$overSpeed = $speed - $limit;
(string)$message ='';

if ($infraction){
    $message = 'speeding';
    if ($overSpeed > 40){
        $message = 'reckless driving';
    } elseif ($overSpeed > 20){
        $message = 'excessive speeding';
    }
}
echo $message;

function getLimit($input){
    (string)$zone = $input[1];
    switch ($zone){
        case 'motorway':
            $speedLimit = 130;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        default:
            echo 'Not a Valid Input';
            $speedLimit = 1000;
    }
    return $speedLimit;
}

function getInfraction($speed, $limit){
    $overSpeed = $speed - $limit;

    $result = true;
    if ($overSpeed <= 0){
        $result = false;
    }

    return $result;
}
