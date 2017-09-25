<?php
declare(strict_types = 1);

$speed = floatval(trim(fgets(STDIN)));
$zone = trim(fgets(STDIN));

$limit = getLimit($zone);
$infraction = getInfraction($speed, $limit);
$overSpeed = $speed - $limit;
(string)$message = '';

if ($infraction){
    $message = 'reckless driving';
    if ($overSpeed < 20) {
        $message = 'speeding';
    } elseif ($overSpeed < 40) {
        $message = 'excessive speeding';
    }
}

echo $message;

function getLimit(string $zone){
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

    if ($overSpeed < 0){
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}
