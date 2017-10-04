<?php
declare(strict_types=1);

class Vehicle
{
    protected $color;
    private $numberDoors;

    public function __construct($color, $numberDoors)
    {
        $this->color = $color;
        $this->numberDoors = $numberDoors;
    }

    public function __get($name)
    {
        if ($this->{$name}) {
            return $this->{$name};
        }
        return "Property doesn't not exist.";
    }

    protected function setDoors($numberDoors)
    {
        $this->numberDoors = $numberDoors;
    }

    protected function getDoors()
    {
        return $this->numberDoors;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    protected function getColor()
    {
        return $this->color;
    }
}