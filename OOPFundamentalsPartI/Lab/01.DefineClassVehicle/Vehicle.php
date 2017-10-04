<?php
declare(strict_types=1);

class Vehicle
{
    private $color;
    private $numberDoors;

    public function __construct(string $numberDoors, string $color)
    {
        $this->color = $color;
        $this->numberDoors = '[' . $numberDoors . '] => ' . $this->color;
    }
}