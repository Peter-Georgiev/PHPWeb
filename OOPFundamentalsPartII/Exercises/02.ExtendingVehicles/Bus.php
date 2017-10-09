<?php
declare(strict_types=1);

class Bus extends Vehicle
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

    public function drive(float $distance, bool $empty = false): string
    {
        if ($empty == false) {
            $this->fuelConsumption += 1.4;
            $res = parent::drive($distance);
            $this->fuelConsumption -= 1.4;
            return $res;
        } else {
            return parent::drive($distance);
        }
    }
}
