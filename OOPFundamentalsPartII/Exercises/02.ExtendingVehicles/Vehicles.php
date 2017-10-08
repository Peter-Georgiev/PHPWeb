<?php
declare(strict_types=1);

abstract class Vehicles
{
    private $fuelQuantity;
    private $litersPerKM;
    private $tankCapacity;
    private $message = '';
    private $driveEmpty = false;

    protected function __construct(float $fuelQuantity, float $litersPerKM, float $tankCapacity)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setLitersPerKM($litersPerKM);
        $this->setTankCapacity($tankCapacity);
    }

    protected function setFuelQuantity(float $fuelQuantity)
    {
        if ($fuelQuantity <= 0) {
            echo "Fuel must be a positive number" . PHP_EOL;
        } else {
            $this->fuelQuantity = $fuelQuantity;
        }
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        $this->litersPerKM = $litersPerKM;
    }

    protected function setTankCapacity(float $tankCapacity)
    {
        $this->tankCapacity = $tankCapacity;
    }

    protected function setMessage($message)
    {
        $this->message = $message;
    }

    protected function setDriveEmpty(bool $driveEmpty)
    {
        $this->driveEmpty = $driveEmpty;
    }

    protected function vehicleDrive(string $vehicle, float $distance)
    {
        $needFuel = $this->getLitersPerKM() * $distance;
        if ($needFuel < $this->getFuelQuantity()) {
            $this->setFuelQuantity($this->getFuelQuantity() - $needFuel);
            echo "$vehicle travelled {$distance} km" . PHP_EOL;
        } else {
            echo "$vehicle needs refueling" . PHP_EOL;
        }
    }

    protected function getFuelQuantity()
    {
        return $this->fuelQuantity;
    }

    protected function getLitersPerKM()
    {
        return $this->litersPerKM;
    }

    protected function getMessage()
    {
        return $this->message;
    }

    protected function getTankCapacity()
    {
        return $this->tankCapacity;
    }

    protected function isDriveEmpty(): bool
    {
        return $this->driveEmpty;
    }
}