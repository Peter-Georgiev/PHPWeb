<?php
declare(strict_types=1);

abstract class Vehicle
{
    protected $fuelQuantity;
    protected $fuelConsumption;
    protected $tankCapacity;

    public function __construct(float $fuelQuantity, float $fuelConsumption, float $tankCapacity)
    {
        if ($fuelQuantity < 0) {
            $fuelQuantity = 0;
        }

        $this->setFuelQuantity($fuelQuantity);
        $this->setFuelConsumption($fuelConsumption);
        $this->setTankCapacity($tankCapacity);
    }

    public function drive(float $distance): string
    {
        $driveee = $this->fuelConsumption * $distance;
        $this->fuelQuantity -= $driveee;
        if ($this->fuelQuantity > 0) {
            return "{$this->getClassName()} travelled {$distance} km";
        } else {
            $this->fuelQuantity += $driveee;
            return "{$this->getClassName()} needs refueling";
        }
    }

    public function refuel(float $amount)
    {
        if ($amount > $this->tankCapacity - $this->fuelQuantity) {
            throw new \Exception("Cannot fit fuel in tank");
        } else {
            return $this->fuelQuantity += $amount;
        }
    }

    public function setFuelQuantity(float $fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    protected function setFuelConsumption(float $fuelConsumption)
    {
        return $this->fuelConsumption = $fuelConsumption;
    }

    public function setTankCapacity($tankCapacity)
    {
        if ($tankCapacity < 0) {
            throw new \Exception("Fuel must be a positive number");
        }
        $this->tankCapacity = $tankCapacity;
    }

    private function getClassName(): string
    {
        return basename(get_class($this));
    }

    public function getFuel()
    {
        return $this->fuelQuantity;
    }
}