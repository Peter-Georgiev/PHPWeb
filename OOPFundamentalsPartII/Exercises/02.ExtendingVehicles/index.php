<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $class = $class . ".php";

    require_once $class;
});


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