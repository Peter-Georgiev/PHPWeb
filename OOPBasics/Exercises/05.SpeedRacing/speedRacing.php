<?php
declare(strict_types=1);
include "Car.php";

$cars = readCLI();

calculateCommand($cars);

printResult($cars);


function readCLI(): array {
    $cars = [];
    $n = intval(fgets(STDIN));
    for ($i = 0; $i < $n; $i++) {
        $tokens = explode(' ', trim(fgets(STDIN)));
        $models = $tokens[0];
        $fuelAmount = floatval($tokens[1]);
        $fuelCostFor1km = floatval($tokens[2]);

        if (array_key_exists($models, $cars)){
            continue;
        }
        $cars[$models] = new Car($models, $fuelAmount, $fuelCostFor1km);
    }
    return $cars;
}

function calculateCommand(array &$cars) {
    while ('End' != $input = trim(fgets(STDIN))) {
        $tokens = explode(' ', $input);

        $drive = $tokens[0];
        if ($drive != 'Drive') {
            continue;
        }

        $models = $tokens[1];
        if (!array_key_exists($models, $cars)) {
            continue;
        }

        $distanceTraveled = floatval($tokens[2]);
        if ($cars[$models]->getFuelAmount() < $distanceTraveled * $cars[$models]->getFuelCostFor1km()) {
            echo 'Insufficient fuel for the drive' .PHP_EOL;
            continue;
        }

        $cars[$models]->setFuelAmount(
            $cars[$models]->getFuelAmount() - $distanceTraveled * $cars[$models]->getFuelCostFor1km()
        );
        $cars[$models]->setDistanceTraveled($distanceTraveled);
    }
}

function printResult(array $cars) {
    $index = count($cars);
    foreach ($cars as $car) {
        echo $car->getModel() . ' ' .
            number_format($car->getFuelAmount(), 2) . ' ' .
            $car->getDistanceTraveled();

        if ($index > 1) {
            echo PHP_EOL;
        }
        $index--;
    }
}