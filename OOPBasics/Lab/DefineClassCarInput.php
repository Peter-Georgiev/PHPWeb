<?php
declare(strict_types=1);
include "DefineClassCar.php";

for ($i = 0; $i < 4; $i++) {
    $arr = explode(' ', trim(fgets(STDIN)));
    if (count($arr) < 2 || count($arr) > 3){
        continue;
    }

    $car = new Car(trim($arr[0]), trim($arr[1]));

    if (count($arr) === 3) {
        $car->setYear(intval(trim($arr[2])));
    }

    //TODO SORT


    if ($car->getYear() > 0) {
        echo $car->getModel() . ', ' . $car->getBrand() . ', ' . $car->getYear();
    } else {
        echo $car->getModel() . ', ' . $car->getBrand();
    }
}