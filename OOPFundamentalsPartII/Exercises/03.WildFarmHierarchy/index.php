<?php
declare(strict_types=1);
require "Animal.php";
require "Food.php";
require "Mammal.php";
require "Vegetable.php";
require "Meat.php";
require "Mouse.php";
require "Felime.php";
require "Zebra.php";
require "Cat.php";
require "Tiger.php";

$row = 1;
while ('End' != $command = trim(fgets(STDIN))) {
    $row++;
    if ($row % 2 == 0) {
        $animalInfo = explode(' ', $command);
        $animlType = $animalInfo[0];
        $animalName = $animalInfo[1];
        $animalWeght = $animalInfo[2];
        $animalLivingRegion = $animalInfo[3];
        $catBreed = null;

        if ($animlType == 'Cat') {
            $catBreed = $animalInfo[4];
        }

        if ($animlType == 'Cat') {
            $animal = new Cat($animlType, $animalName, $animalWeght, $animalLivingRegion, $catBreed);
        } elseif ($animlType == 'Mouse') {
            $animal = new Mouse($animlType, $animalName, $animalWeght, $animalLivingRegion);
        } elseif ($animlType == 'Zebra') {
            $animal = new Zebra($animlType, $animalName, $animalWeght, $animalLivingRegion);
        } elseif ($animlType == 'Tiger') {
            $animal = new Tire($animlType, $animalName, $animalWeght, $animalLivingRegion);
        } else {
            $foodInfo = explode(' ', $command);
            $foodType = $foodInfo[0];
            $foodQuantity = $foodInfo[1];

            if ($foodInfo == 'Vagetable') {
                $food = new Vegetable(intval( $foodQuantity));
            }
        }


    }

}