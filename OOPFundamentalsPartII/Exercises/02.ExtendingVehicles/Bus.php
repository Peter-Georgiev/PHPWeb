<?php
declare(strict_types=1);

class Bus extends Vehicles
{
    public function __construct(float $fuelQuantity, float $litersPerKM, float $tankCapacity)
    {
        parent::__construct($fuelQuantity, $litersPerKM, $tankCapacity);
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        if (parent::isDriveEmpty()) {
            parent::setDriveEmpty(false);
            parent::setLitersPerKM($litersPerKM);
        } else {
            parent::setLitersPerKM($litersPerKM + 1.4);
        }
    }

    public function refuel(float $fuelQuantity)
    {
        if (parent::getFuelQuantity() + $fuelQuantity > parent::getTankCapacity()) {
            echo("Cannot fit fuel in tank") . PHP_EOL;
        } else {
            parent::setFuelQuantity(parent::getFuelQuantity() + $fuelQuantity);
        }
    }

    public function driveEmpty()
    {
        parent::setDriveEmpty(true);
    }

    public function drive(float $distance)
    {
        parent::vehicleDrive('Bus', $distance);
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
