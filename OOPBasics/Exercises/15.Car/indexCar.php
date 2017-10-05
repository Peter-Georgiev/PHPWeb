<?php
declare(strict_types=1);
include "Car.php";

$input = explode(" ", fgets(STDIN));
$speed = floatval($input[0]);
$fuel = floatval($input[1]);
$fuelEconomy = floatval($input[2]);
$car = new Car($speed, $fuel, $fuelEconomy);

while (true) {
    $commands = explode(" ", fgets(STDIN));
    if (trim($commands[0]) == "END") {
        break;
    } else if (trim($commands[0]) == "Travel") {
        $car->travel(floatval($commands[1]));
    } else if (trim($commands[0]) == "Refuel") {
        $car->reFuel(floatval($commands[1]));
    } else if (trim($commands[0]) == "Distance") {
        $car->printDistance();
    } else if (trim($commands[0]) == "Time") {
        $car->printTime();
    } else if (trim($commands[0]) == "Fuel") {
        $car->printFuel();
    }
}