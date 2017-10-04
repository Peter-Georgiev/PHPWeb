<?php
declare(strict_types=1);
include "Car.php";

$cars = null;
while ('END' != $input = trim(fgets(STDIN))) {
    $tokens = explode(' ', $input);

    if (count($tokens) == 3) {
        $cars = new Car(floatval($tokens[0]), floatval($tokens[1]), floatval($tokens[2]));
    } elseif (count($tokens) == 2 && $tokens[0] == 'Travel') {
        $cars->setTravel(floatval($tokens[1]));
    } elseif (count($tokens) == 2 && $tokens[0] == 'Refuel') {
        $cars->setRefuel(floatval($tokens[1]));
    }elseif ($input == 'Distance') {
        echo 'Total distance: ' . $cars->GetTotalDistance() . PHP_EOL;
    } elseif ($input == 'Time') {
        echo 'Total time: ' . $cars->getHours() . ' hours and ' .
            $cars->getMinutes() . ' minutes' . PHP_EOL;
    } elseif ($input == 'Fuel') {
        echo 'Fuel left: ' . $cars->getRemFuel() . ' liters' . PHP_EOL;
    }
}