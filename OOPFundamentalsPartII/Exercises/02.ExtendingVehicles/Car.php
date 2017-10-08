<?php
declare(strict_types=1);

class Car extends Vehicles
{
    public function __construct(float $fuelQuantity, float $litersPerKM, float $tankCapacity)
    {
        parent::__construct($fuelQuantity, $litersPerKM, $tankCapacity);
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        parent::setLitersPerKM($litersPerKM + 0.9);
    }

    public function refuel(float $fuelQuantity)
    {
        if (parent::getFuelQuantity() + $fuelQuantity > parent::getTankCapacity()) {
            echo("Cannot fit fuel in tank") . PHP_EOL;
        } else {
            parent::setFuelQuantity(parent::getFuelQuantity() + $fuelQuantity);
        }
    }

    public function drive(float $distance)
    {
        parent::vehicleDrive('Car', $distance);
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