<?php
declare(strict_types=1);

class Truck extends Vehicle
{
    public function setFuelConsumption(float $fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption + 1.6;
    }

    public function refuel(float $amount): float
    {
        return $this->fuelQuantity += $amount * 0.95;
    }
}
