<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

while ('End' != $input = trim(fgets(STDIN))) {

    $animal = null;

    $input = explode(" ", $input);

    $animalType = $input[0];
    $animalName = $input[1];
    $animalWeight = floatval($input[2]);
    $animalLivingRegion = $input[3];

    if (count($input) == 5 && $animalType == "Cat") {
        $catBread = $input[4];
        $animal = new Cat($animalName, $animalType, floatval($animalWeight), $animalLivingRegion, $catBread);
    } else if (count($input) == 4 && $animalType == "Tiger") {
        $animal = new Tiger($animalName, $animalType, floatval($animalWeight), $animalLivingRegion);
    } else if (count($input) == 4 && $animalType == "Zebra") {
        $animal = new Zebra($animalName, $animalType, floatval($animalWeight), $animalLivingRegion);
    } else if (count($input) == 4 && $animalType == "Mouse") {
        $animal = new Mouse($animalName, $animalType, floatval($animalWeight), $animalLivingRegion);
    }

    $food = null;

    $odd = explode(' ', trim(fgets(STDIN)));
    $foodType = $odd [0];
    $foodQuantity = floatval($odd [1]);

    if ($foodType == "Meat") {
        $food = new Meat($foodQuantity, $foodType);
    } else if ($foodType == "Vegetable") {
        $food = new Vegatable($foodQuantity, $foodType);
    }

    echo $animal->makeSound() . PHP_EOL;

    try {
        $animal->eat($food, $foodType);
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    echo $animal.PHP_EOL;
}