<?php
declare(strict_types=1);

class Food
{
    private $quantity;
    private function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}