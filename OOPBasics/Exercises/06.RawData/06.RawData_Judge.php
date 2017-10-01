<?php
declare(strict_types=1);
/* Problem 06.	*Raw data */
class Car
{
    public $model;
    public $engine;
    public $cargo;
    public $tires;

    public function __construct(string $model, Engine $engine,
                                Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }
}

class Engine
{
    public $speed;
    public $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}

class Cargo
{
    public $weight;
    public $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
}

class Tire
{
    public $pressure;
    public $age;

    public function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }
}

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