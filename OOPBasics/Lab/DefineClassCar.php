<?php
declare(strict_types=1);
/* Problem 01. Define a class Car */
class Car
{
    private $brand;
    private $model;
    private $year;

    public function __construct(string $brand, string $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    /**
     * @param mixed $year
     */
    public function setYear(int $year)
    {
        if ($year > 1940 && $year < 3000){
            $this->year = $year;
        }
        $this->year = 0;
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
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}