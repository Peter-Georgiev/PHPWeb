<?php
declare(strict_types=1);

class Car
{
    private $model;
    private $engine;
    private $weight; //optional
    private $color; //optional

    public function __construct(string $model, string $engine,
                                string $weight = 'n/a', string $color = 'n/a')
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): string
    {
        return $this->engine;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function __toString()
    {
        return $this->getModel() . ':' . PHP_EOL;
    }
}

class Engine
{
    private $model;
    private $power;
    private $displacement; //optional
    private $efficiency; //optional

    public function __construct(string $model, string $power,
                                string $displacement = "n/a", string $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getDisplacment(): string
    {
        return $this->displacement;
    }

    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    public function __toString()
    {
        return "\t" . $this->getModel() . ':' . PHP_EOL . //<EngineModel>:
            "\t\tPower: " . $this->getPower() . PHP_EOL . //<EnginePower>
            "\t\tDisplacement: " . $this->getDisplacment() . PHP_EOL . //<EngineDisplacement>
            "\t\tEfficiency: " . $this->getEfficiency() . PHP_EOL; //<EngineEfficiency>
    }
}

$engines = readEngineAndCar($engines, 'Engine');

$cars = readEngineAndCar($cars, 'Car');

foreach ($cars as $car) {
    foreach ($engines as $engine) {
        if ($car->getEngine() == $engine->getModel()) {
            echo $car;
            echo $engine;
            echo "\tWeight: " . $car->getWeight() . PHP_EOL; //<CarWeight>
            echo "\tColor: " . $car->getColor() . PHP_EOL; //<CarColor>
        }
    }
}

function readEngineAndCar(array $arr, string $objStr): array {
    $arr = [];
    $n = intval(trim(fgets(STDIN)));
    for ($i = 0; $i < $n; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));

        if (count($input) === 2) {
            $arr[] = new $objStr(trim($input[0]), trim($input[1]));
            continue;
        }

        if (count($input) === 3) {
            if (is_numeric($input[2])){
                $arr[] = new $objStr(trim($input[0]), trim($input[1]), $input[2]);
                continue;
            }
            $arr[] = new $objStr(trim($input[0]), trim($input[1]), 'n/a', $input[2]);
            continue;
        }

        if (count($input) === 4) {
            $arr[] = new $objStr(trim($input[0]), trim($input[1]), $input[2], trim($input[3]));
        }
    }
    return $arr;
}