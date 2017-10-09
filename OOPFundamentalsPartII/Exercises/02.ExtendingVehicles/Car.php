<?php
declare(strict_types=1);

class Car extends Vehicle
{
    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCapacity)
    {
        if ($fuelQuantity < 0) {
            $fuelQuantity = 0;
        }
        if ($fuelQuantity > $tankCapacity) {
            echo "Cannot fit fuel in tank" . PHP_EOL;
            $fuelQuantity = 0;
            $tankCapacity = 0;
        }

        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
    }

    public function setFuelConsumption(float $fuelConsumption)
    {
        $this->fuelConsumption = $fuelConsumption + 0.9;
    }
}