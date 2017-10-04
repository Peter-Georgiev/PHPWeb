<?php
declare(strict_types=1);

class Car
{
    //model, engine, weight and color.
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

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @return string
     */
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
    //model, power, displacement and efficiency.
    private $model;
    private $power;
    private $displacement; //optional
    private $efficiency; //optional

    public function __construct(string $model, string $power,
                                string $displacement = "n/a",
                                string $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getPower(): string
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getDisplacment(): string
    {
        return $this->displacement;
    }

    /**
     * @return string
     */
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

$engines = [];
readEngineAndCar($engines, 'Engine');
$cars = [];
readEngineAndCar($cars, 'Car');

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

function readEngineAndCar(array &$arr, string $objStr): array {
    $n = intval(trim(fgets(STDIN)));
    for ($i = 0; $i < $n; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));

        if (count($input) === 2) {
            $arr[] = new $objStr(trim($input[0]), trim($input[1]));
        }

        if (count($input) === 3) {
            if (is_numeric(trim($input[2]))){
                $arr[] = new $objStr(trim($input[0]), trim($input[1]), trim($input[2]));
                continue;
            }
            $arr[] = new $objStr(trim($input[0]), trim($input[1]), 'n/a', trim($input[2]));
        }

        if (count($input) === 4) {
            $arr[] = new $objStr(trim($input[0]), trim($input[1]), trim($input[2]), trim($input[3]));
        }
    }
    return $arr;
}