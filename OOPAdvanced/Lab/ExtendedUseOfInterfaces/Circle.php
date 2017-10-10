<?php
declare(strict_types=1);

class Circle implements Area,Circumference
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getSurface(): string
    {
        $area = number_format(2 * M_PI * $this->radius, 2 , '.', '');
        return "Area = {$area} mm";
    }

    public function getCircumference(): string
    {
        $diameter = 2 * $this->radius;
        return "Circumference = {$diameter} mm";
    }

    public function __toString()
    {
        return "Circle with radius = {$this->radius} mm";
    }
}