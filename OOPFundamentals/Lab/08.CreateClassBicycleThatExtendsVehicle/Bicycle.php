<?php
declare(strict_types=1);

class Bicycle extends Vehicle
{
    private $brand;
    private $model;
    private $year;
    private $forSkirt = -1;
    private $rideOrStop = false;

    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        parent::__construct('Black', 0);
    }

    public function ried()
    {
        $this->rideOrStop = true;
    }

    public function stop()
    {
        $this->rideOrStop = false;
    }

    public function setForSkirt($forSkirt)
    {
        if ($forSkirt){
            $this->forSkirt = 1;
        } else {
            $this->forSkirt = 0;
        }
    }

    private function isRideOrStop(): string
    {
        if ($this->rideOrStop) {
            return "RIDE";
        }
        return "STOP";
    }

    private function getForSkirt(): string
    {
        if ($this->forSkirt == 1) {
            return "TRUE";
        } elseif ($this->forSkirt == 0) {
            return "FALSE";
        }
        return "NULL";
    }

    public function __toString()
    {
        return
            "<div>
                <table>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Color</th>
                        <th>Year</th>
                        <th>Doors</th>
                        <th>Skirt</th>
                        <th>Ride/Stop</th>
                    </tr>
                    <tr>
                        <td>" . $this->brand . "</td>
                        <td>" . $this->model . "</td>
                        <td>" . parent::getColor() . "</td>
                        <td>" . $this->year . "</td>
                        <td>" . parent::getDoors() . "</td>
                        <td>" . $this->getForSkirt() . "</td>
                        <td>" . $this->isRideOrStop() . "</td>
                    </tr>
                </table>
            </div>";
    }
}
