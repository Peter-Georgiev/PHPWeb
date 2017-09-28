<?php
declare(strict_types=1);

namespace SoftUni\Oop;
/* Problem 01. Define a class Car
*  Problem 02.	Add a Constructor
*  Problem 03.	Add a methods
*/

class Car
{
    private $brand;
    private $year;

    /**
     * Car constructor.
     * @param string $brand
     * @param string $model
     */
    public function __construct(string $brand,
                                string $model,
                                string $engine,
                                string $numberOfSeats,
                                string $horsepower)
    {
        $this->brand = $brand;
        $this->model = new Model($model, $engine, $numberOfSeats, $horsepower);
    }

    /**
     * @param mixed $year
     */
    public function setYear(int $year)
    {
        if ($year > 999 && $year < 3001) {
            $this->year = $year;
        } else {
            throw new \Exception("Error: year from 1000 to 3000.");
        }
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }
}

class Model
{
    private $model;
    private $engine;
    private $numberOfSeats;
    private $horsepower;

    public function __construct(string $model, string $engine, string $numberOfSeats, string $horsepower)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->numberOfSeats = $numberOfSeats;
        $this->horsepower = $horsepower;
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
    public function getNumberOfSeats(): string
    {
        return $this->numberOfSeats;
    }

    /**
     * @return string
     */
    public function getHorsepower(): string
    {
        return $this->horsepower;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}