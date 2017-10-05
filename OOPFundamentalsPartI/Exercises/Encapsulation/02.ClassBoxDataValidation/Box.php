<?php
declare(strict_types=1);

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    private function setLength(float $length)
    {
        if ($length <= 0) {
            exit("Length cannot be zero or negative.");
        }
        $this->length = $length;
    }

    private function setWidth(float $width)
    {
        if ($width <= 0) {
            exit("Width cannot be zero or negative.");
        }
        $this->width = $width;
    }

    private function setHeight(float $height)
    {
        if ($height <= 0) {
            exit("Height cannot be zero or negative.");
        }
        $this->height = $height;
    }

    private function surfaceArea()
    {
        return number_format((2 * $this->length * $this->width) +
            (2 * $this->length * $this->height) +
            (2 * $this->width * $this->height), 2, '.', '');
    }

    private function lateralSurfaceArea()
    {
        return number_format((2 * $this->length * $this->height) +
            (2 * $this->width * $this->height), 2, '.', '');
    }

    private function volume()
    {
        return number_format($this->length * $this->width * $this->height, 2, '.', '');
    }

    public function __toString()
    {
        return "Surface Area - " . $this->surfaceArea() . PHP_EOL .
            "Lateral Surface Area - " . $this->lateralSurfaceArea() . PHP_EOL .
            "Volume - " . $this->volume();
    }
}
