<?php
declare(strict_types=1);

class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCostFor1km;
    private $distanceTraveled = 0;

    public function __construct(string $model, float $fuelAmount, float $fuelCostFor1km)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostFor1km = $fuelCostFor1km;
    }

    public function setFuelAmount(float $fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    public function setDistanceTraveled(float $distanceTraveled)
    {
        $this->distanceTraveled += $distanceTraveled;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    public function getFuelCostFor1km(): float
    {
        return $this->fuelCostFor1km;
    }

    public function getDistanceTraveled(): float
    {
        return $this->distanceTraveled;
    }
}