<?php
declare(strict_types=1);
include "Vehicle.php";
include "Bicycle.php";

$myBicycle = new Bicycle('Drag', 'Grizzly', 2016);

$myBicycle->ried();
echo $myBicycle;

$myBicycle->setColor('Blue');
$myBicycle->stop();
$myBicycle->setForSkirt(true);
echo $myBicycle;