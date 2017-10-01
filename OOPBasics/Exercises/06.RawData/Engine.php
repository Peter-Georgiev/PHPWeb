<?php
declare(strict_types=1);
/* Problem 06.	*Raw data */
class Engine
{
    public $speed;
    public $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}