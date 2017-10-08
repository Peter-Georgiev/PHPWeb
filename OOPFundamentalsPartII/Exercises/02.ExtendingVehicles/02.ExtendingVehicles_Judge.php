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


list($vehicle, $fuel, $liters, $tankCapacity) = explode(' ', trim(fgets(STDIN)));
$car = new Car(floatval($fuel), floatval($liters), floatval($tankCapacity));

list($vehicle, $fuel, $liters, $tankCapacity) = explode(' ', trim(fgets(STDIN)));
$truck = new Truck(floatval($fuel), floatval($liters), floatval($tankCapacity));

list($vehicle, $fuel, $liters, $tankCapacity) = explode(' ', trim(fgets(STDIN)));
$bus = new Bus(floatval($fuel), floatval($liters), floatval($tankCapacity));

$n = intval(fgets(STDIN));
while ($n--) {
    list($command, $vehicle, $km) = explode(' ', trim(fgets(STDIN)));

    if ($command == 'Drive') {
        if ($vehicle == 'Car') {
            $car->drive(floatval($km));
        } elseif ($vehicle == 'Truck') {
            $truck->drive(floatval($km));
        } elseif ($vehicle == 'Bus') {
            $bus->drive(floatval($km));
        }
    } elseif ($command == 'Refuel') {
        if ($vehicle == 'Car') {
            $car->refuel(floatval($km));
        } elseif ($vehicle == 'Truck') {
            $truck->refuel(floatval($km));
        } elseif ($vehicle == 'Bus') {
            $bus->refuel(floatval($km));
        }
    } elseif ($command == 'DriveEmpty' && $vehicle == 'Bus') {
        $bus->driveEmpty();
        $bus->drive(floatval($km));
    }
}

echo "Car: {$car->getFuelQuantity()}" . PHP_EOL;
echo "Truck: {$truck->getFuelQuantity()}" . PHP_EOL;
echo "Bus: {$bus->getFuelQuantity()}";