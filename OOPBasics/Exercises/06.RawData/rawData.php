<?php
declare(strict_types=1);
/* Problem 06.	*Raw data */

include "Car.php";
include "Engine.php";
include "Cargo.php";
include "Tire.php";

$carsCount = intval(trim(fgets(STDIN)));

$cars = [];
for ($i = 0; $i < $carsCount; $i++) {
    $carInfo = explode(' ', trim(fgets(STDIN)));

    list($model, $engineSpeed, $enginePower,
        $cargoWeight, $cargoType, $tirelPressure, $tirelAge,
        $tire2Pressure, $tire2Age, $tire3Pressure, $tire3Age,
        $tire4Pressure, $tire4Age) = $carInfo;

    $engine = new Engine(intval($engineSpeed), intval($enginePower));
    $cargo = new Cargo(intval($cargoWeight), $cargoType);

    $tire1 = new Tire(floatval($tirelPressure), intval($tirelAge));
    $tire2 = new Tire(floatval($tire2Pressure), intval($tire2Age));
    $tire3 = new Tire(floatval($tire3Pressure), intval($tire3Age));
    $tire4 = new Tire(floatval($tire4Pressure), intval($tire4Age));

    $tires = array($tire1, $tire2, $tire3, $tire4);

    $cars[] = new Car($model, $engine, $cargo, $tires);
}

$command = trim(fgets(STDIN));

if ($command == 'fragile') {
    foreach ($cars as $car) {
        if ($car->cargo->type != 'fragile') {
            continue;
        }

        foreach ($car->tires as $tire) {
            if ($tire->pressure < 1) {
                echo $car->model . PHP_EOL;
                break;
            }
        }
    }
} elseif ($command == 'flamable') {
    foreach ($cars as $car) {
        if ($car->cargo->type == 'flamable' && $car->engine->power > 250){
                echo $car->model . PHP_EOL;
        }
    }
}
