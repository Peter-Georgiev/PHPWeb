<?php
declare(strict_types=1);
include "Engine.php";
include "Car.php";

$engines = [];
readEngineAndCar($engines, 'Engine');
$cars = [];
readEngineAndCar($cars, 'Car');

$index = count($cars);
foreach ($cars as $car) {
    foreach ($engines as $engine) {
        if ($car->getEngine() == $engine->getModel()) {
            echo $car->getModel() . ':' . PHP_EOL;  //<CarModel>:
            echo "\t" . $engine->getModel() . ':' . PHP_EOL; //<EngineModel>:
            echo "\t\tPower: " . $engine->getPower() . PHP_EOL; //<EnginePower>
            echo "\t\tDisplacement: " . $engine->getDisplacment() . PHP_EOL; //<EngineDisplacement>
            echo "\t\tEfficiency: " . $engine->getEfficiency() . PHP_EOL; //<EngineEfficiency>
            echo "\tWeight: " . $car->getWeight() . PHP_EOL; //<CarWeight>
            echo "\tColor: " . $car->getColor(); //<CarColor>
        }
    }
    if ($index > 1) {
        echo PHP_EOL;
    }
    $index--;
}

function readEngineAndCar(array &$arr, string $objStr): array {
    $n = intval(fgets(STDIN));
    for ($i = 0; $i < $n; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));

        if (count($input) === 2) {
            $model = trim($input[0]);
            $arr[$model] = new $objStr($model, trim($input[1]));
            continue;
        }

        if (count($input) === 3) {
            $model = trim($input[0]);
            if (is_numeric($input[2])){
                $arr[$model] = new $objStr($model, trim($input[1]), trim($input[2]));
                continue;
            }
            $arr[$model] = new $objStr($model, trim($input[1]), 'n/a', trim($input[2]));
            continue;
        }

        if (count($input) === 4) {
            $model = trim($input[0]);
            $arr[$model] = new $objStr($model, trim($input[1]), trim($input[2]), trim($input[3]));
        }
    }
    return $arr;
}
