<?php
declare(strict_types=1);

class Car
{
    private $carModel;
    private $carSpeed;

    public function __construct(string $carModel, float $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }

    public function __toString()
    {
        return $this->carModel . ' ' . $this->carSpeed;
    }
}