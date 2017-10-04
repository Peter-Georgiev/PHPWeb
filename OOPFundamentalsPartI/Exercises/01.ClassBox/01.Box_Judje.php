<?php
declare(strict_types=1);

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
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

$numbers = [];
for ($i = 0; $i < 3; $i++) {
    $numbers[] = floatval(fgets(STDIN));
}

$box = new Box($numbers[0], $numbers[1], $numbers[2]);

echo $box;