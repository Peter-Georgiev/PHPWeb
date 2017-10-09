<?php
declare(strict_types=1);

abstract class Food
{
    protected $quantity;
    protected $foodType;

    public function __construct(float $quantity, string $foodType)
    {
        $this->quantity = $quantity;
        $this->foodType = $foodType;
    }
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getFoodType(): string
    {
        return $this->foodType;
    }
}
