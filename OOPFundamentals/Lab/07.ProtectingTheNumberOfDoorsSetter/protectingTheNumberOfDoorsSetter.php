<?php
declare(strict_types=1);
include "Vehicle.php";
include "Car.php";
error_reporting(E_ALL^E_NOTICE);

$myCar = new Car('Rad', 4, 'Audy', 'A4', 2016);
print_r($myCar);

$myCar->numberDoors = 6;
//$myCar->setDoors(5);

print_r($myCar);