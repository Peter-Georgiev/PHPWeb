<?php
declare(strict_types=1);

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $traveledDistance;

    public function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }

    public function setTravel(float $distanceToTravel)
    {
        $this->traveledDistance = $distanceToTravel;
    }

    public function setRefuel(float $refuelAmount)
    {
        $this->fuel += $refuelAmount;
    }

    public function GetTotalDistance()
    {
        return number_format($this->traveledDistance, 1);
    }

    public function getHours()
    {
        return (int)$this->traveledDistance / (int)$this->speed;
    }

    public function getMinutes()
    {
        return (int)$this->traveledDistance % (int)$this->speed;
    }

    public function getRemFuel()
    {
        $remFuel = $this->fuel - $this->fuelEconomy *
            ($this->traveledDistance / $this->speed);
        return number_format($remFuel, 1);
    }
}

$cars = null;
while ('END' != $input = trim(fgets(STDIN))) {
    $tokens = explode(' ', $input);

    if (count($tokens) == 3) {
        $cars = new Car(floatval($tokens[0]), floatval($tokens[1]), floatval($tokens[2]));
    } elseif ($tokens[0] == 'Travel') {
        $cars->setTravel(floatval($tokens[1]));
    } elseif ($tokens[0] == 'Refuel') {
        $cars->setRefuel(floatval($tokens[1]));
    }elseif ($input == 'Distance') {
        echo 'Total Distance: ' . $cars->GetTotalDistance() . PHP_EOL;
    } elseif ($input == 'Time') {
        echo 'Total Time: ' . $cars->getHours() . ' hours and ' .
            $cars->getMinutes() . ' minutes' . PHP_EOL;
    } elseif ($input == 'Fuel') {
        echo 'Fuel left: ' . $cars->getRemFuel() . ' liters' . PHP_EOL;
    }
}