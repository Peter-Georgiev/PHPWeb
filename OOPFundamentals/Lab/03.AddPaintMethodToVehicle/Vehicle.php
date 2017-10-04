<?php
declare(strict_types=1);

class Vehicle
{
    private $color;
    private $doors;

    public function __construct(int $numberDoors, string $color)
    {
        $this->setColor($color);
        $this->setDoors($numberDoors);
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function setDoors($doors)
    {
        $this->doors = $doors;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getDoors()
    {
        return $this->doors;
    }

    public function __get($name) {
        if ($this->{$name}) {
            return $this->{$name};// {} - чрез името на променливата да се достигне пропарти на класа
        }
        return "Property doesn't not exist.";
    }
}