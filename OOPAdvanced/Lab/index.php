<?php
declare(strict_types=1);

interface Area
{
    public function getSurface();
}

class Circle implements Area
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = 2 * M_PI * $radius;
    }

    public function getSurface()
    {
        echo $this->radius;
    }
}

class Rectangle implements Area
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    private function getArea(): float
    {
        return $this->height * $this->width;
    }

    public function getSurface()
    {
        echo $this->getArea();
    }
}


$radius = new Circle(10);
$radius->getSurface() . PHP_EOL;

$rectangle = new Rectangle(15, 35);
$rectangle->getSurface();