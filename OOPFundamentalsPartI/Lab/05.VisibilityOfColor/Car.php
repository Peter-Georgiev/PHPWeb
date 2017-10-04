<?php
declare(strict_types=1);

class Car extends Vehicle
{
    private $model;
    private $year;
    private $brand;

    public function __construct(string $color, int $numberDoors,
                                string $brand, string $model, int $year)
    {
        parent::__construct($color, $numberDoors);
        $this->model = $model;
        $this->year = $year;
        $this->brand = $brand;
    }

    public function paint($paint_color)
    {
        parent::setColor($paint_color);
    }
}