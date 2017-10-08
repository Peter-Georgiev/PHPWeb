<?php
declare(strict_types=1);

class Truck extends Vehicles
{
    public function __construct(float $fuelQuantity, float $litersPerKM, float $tankCapacity)
    {
        parent::__construct($fuelQuantity, $litersPerKM, $tankCapacity);
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        parent::setLitersPerKM($litersPerKM + 1.6);
    }

    public function refuel(float $fuelQuantity)
    {
        parent::setFuelQuantity(parent::getFuelQuantity() + ($fuelQuantity * 0.95));
    }

    public function drive(float $distance)
    {
        parent::vehicleDrive('Truck', $distance);
    }

    public function getMessage()
    {
        return parent::getMessage();
    }

    public function getFuelQuantity()
    {
        return number_format(parent::getFuelQuantity(), 2 ,'.', '');
    }
}