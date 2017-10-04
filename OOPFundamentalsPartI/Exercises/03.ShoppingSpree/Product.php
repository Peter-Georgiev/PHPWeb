<?php
declare(strict_types=1);

class Product
{
    private $name;
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}