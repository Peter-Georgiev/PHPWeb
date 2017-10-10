<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    //$class = str_replace('\\', '/', $class);
    $class = $class . ".php";

    require_once $class;
});

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