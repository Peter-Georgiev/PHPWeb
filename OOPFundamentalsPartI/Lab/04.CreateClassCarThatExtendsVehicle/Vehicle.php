<?php
declare(strict_types=1);

class Vehicle
{
    private $color;
    private $numberDoors;

    public function __construct($color, $numberDoors)
    {
        $this->color = $color;
        $this->numberDoors = $numberDoors;
    }

    public function __get($name) {
        if ($this->{$name}) {
            return $this->{$name};
        }
        return "Property doesn't not exist.";
    }
}