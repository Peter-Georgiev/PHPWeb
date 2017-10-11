<?php
declare(strict_types=1);

class Rebel implements IBuyer
{
    const TYPE = "Rebel";
    private $name;
    private $age;
    private $group;
    private $buyFood = 0;

    public function __construct(string $name, int $age, string $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
    }

    public function buyFood(int $food = 5)
    {
        $this->buyFood += $food;
    }

    public function getBuyFood(): int
    {
        return $this->buyFood;
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}