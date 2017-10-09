<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $class = $class . ".php";

    require_once $class;
});

while ('End' != $input = trim(fgets(STDIN))) {

    $animal = null;

    list($animalType, $animalName, $animalWeight, $animalLivingRegion) =
        explode(" ", $input);

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
    list($foodType, $foodQuantity) = explode(" ", trim(fgets(STDIN)));

    if ($foodType == "Meat") {
        $food = new Meat(floatval($foodQuantity), $foodType);
    } else if ($foodType == "Vegetable") {
        $food = new Vegatable(floatval($foodQuantity), $foodType);
    }

    echo $animal->makeSound() . PHP_EOL;

    try {
        $animal->eat($food, $foodType);
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    echo $animal.PHP_EOL;
}