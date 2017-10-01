<?php
declare(strict_types=1);
/* Problem 06.	*Raw data */
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