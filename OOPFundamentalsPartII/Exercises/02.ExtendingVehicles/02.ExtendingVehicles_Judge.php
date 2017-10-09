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

list($vehicle, $fuel, $liters, $tankCapacity) = explode(" ", trim(fgets(STDIN)));
$car = new Car(floatval($fuel), floatval($liters), floatval($tankCapacity));

list($vehicle, $fuel, $liters, $tankCapacity) = explode(" ", trim(fgets(STDIN)));
$truck = new Truck(floatval($fuel), floatval($liters), floatval($tankCapacity));

list($vehicle, $fuel, $liters, $tankCapacity) = explode(" ", trim(fgets(STDIN)));
$bus = new Bus(floatval($fuel), floatval($liters), floatval($tankCapacity));

$n = intval(fgets(STDIN));
while ($n--) {
    try {
        list($command, $vehicle, $liters) = explode(' ', trim(fgets(STDIN)));

        if ($command == 'Drive') {
            if ($vehicle == 'Car') {
                echo $car->drive(floatval($liters)) . PHP_EOL;
            } elseif ($vehicle == 'Truck') {
                echo $truck->drive(floatval($liters)) . PHP_EOL;;
            } elseif ($vehicle == 'Bus') {
                echo $bus->drive(floatval($liters)) . PHP_EOL;
            }
        } elseif ($command == 'Refuel') {
            if ($vehicle == 'Car') {
                $car->refuel(floatval($liters));
            } elseif ($vehicle == 'Truck') {
                $truck->refuel(floatval($liters));
            } elseif ($vehicle == 'Bus') {
                $bus->refuel(floatval($liters));
            }
        } elseif ($command == 'DriveEmpty' && $vehicle == 'Bus') {
            echo $bus->drive(floatval($liters), true) . PHP_EOL;
        }
    } catch (\Exception $e) {
        echo ($e->getMessage()) . PHP_EOL;
    }
}

echo "Car: " . number_format($car->getFuel(), 2, '.', '') . PHP_EOL;
echo "Truck: " . number_format($truck->getFuel(), 2, '.', '') . PHP_EOL;
echo "Bus: " . number_format($bus->getFuel(), 2, '.', '');