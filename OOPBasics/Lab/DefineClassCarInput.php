<?php
declare(strict_types=1);
include "DefineClassCar.php";

/* Problem 04.	Make a instances
*  Problem 05.	Add sub class
*/

use SoftUni\Oop\Car;

/* TEST
* Nissan X-trail 2007 petrol 5+1 125/n
* Renault Scenic 2001 diesel 6+1 115/n
* Audi A6 2001 petrol 5+1 135/n
* Renault Clio 1995 diesel 4+1 115/n
*/


$arr = readCLI();

$cars = readAndSortCars($arr);

printResult($cars);

function readCLI(): array
{
    $arr = [];
    for ($i = 0; $i < 4; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));

        if (count($input) != 6) {
            continue;
        }
        $arr[] = $input;
    }
    return $arr;
}

function readAndSortCars(array $arr): array
{
    $index = 0;
    while ($index < count($arr)) {

        $car = new Car(trim($arr[$index][0]), trim($arr[$index][1]),
            trim($arr[$index][3]), trim($arr[$index][4]), trim($arr[$index][5]));

        $car->setYear(intval(trim($arr[$index][2])));

        $cars[] = $car;
        $index++;
    }

    usort($cars, function ($a, $b) {
        if ($a->getBrand() == $b->getBrand()) {
            $modelA = $a->getModel();
            $modelB = $b->getModel();
            if ($modelA->getModel() == $modelB->getModel()) {
                if ($a->getYear() > $b->getYear()) {
                    return 0;
                }
                return ($a->getYear() < $b->getYear()) ? -1 : 1;
            }
            return ($a->getModel() < $b->getModel()) ? -1 : 1;
        }
        return ($a->getBrand() < $b->getBrand()) ? -1 : 1;

    });
    return $cars;
}

function printResult(array $cars): void
{
    foreach ($cars as $kvp) {
        $model = $kvp->getModel();
        echo '*' . $kvp->getBrand() . ',' . $model->getModel() . ',' . $kvp->getYear() . "\n";
        echo '--' . $model->getEngine() . ',' . $model->getNumberOfSeats() . ',' . $model->getHorsepower() . "\n";

    }
}