<?php
declare(strict_types=1);

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

    public function getSurface(): string
    {
        return "Rectangle, width = {$this->width} mm, height = {$this->height} mm, area = {$this->getArea()} mm";
    }
}
