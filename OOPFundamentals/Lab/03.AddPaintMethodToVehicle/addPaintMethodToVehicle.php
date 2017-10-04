<?php
declare(strict_types=1);
include "Vehicle.php";
//error_reporting(E_ALL^E_NOTICE);

$myVehicle = new Vehicle(2, 'red');

echo $myVehicle->getColor() . PHP_EOL;

$myVehicle->setColor('blue');

echo $myVehicle->getColor();
