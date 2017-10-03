<?php
declare(strict_types=1);

class Car extends Vehicle
{

    private $model;
    private $year;
    private $brand;

    public function __construct($color, $numberDoors, $brand, $model, $year)
    {
        parent::__construct($color, $numberDoors);
        $this->model = $model;
        $this->year = $year;
        $this->brand = $brand;
    }

    public function paint($painv_color)
    {
        //todo
    }
}