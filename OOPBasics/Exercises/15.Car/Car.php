<?php
declare(strict_types=1);

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $traveledDistance;
    private $distancePassed;

    public function __construct(float $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->distancePassed = 0;
    }

    public function setTravel(float $distanceToTravel)
    {
        $fuelPerKM = $this->fuelEconomy / 100;

        $fuelNeeded = $distanceToTravel * $fuelPerKM;

        if ($fuelNeeded > $this->fuel) {
            $kilometersPerLiter = 100 / $this->fuelEconomy;

            $this->distancePassed += $this->fuel * $kilometersPerLiter;
            $this->fuel = 0;
        } else {
            $this->fuel -= $fuelNeeded;
            $this->distancePassed += $distanceToTravel;
        }
    }

    public function setRefuel(float $refuelAmount)
    {
        $this->fuel += $refuelAmount;
    }

    public function GetTotalDistance()
    {
        return number_format($this->distancePassed, 1);
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