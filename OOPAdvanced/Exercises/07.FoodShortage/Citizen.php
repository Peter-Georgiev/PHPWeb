<?php
declare(strict_types=1);

class Citizen implements IIidentification, IInfoCitizen, IBuyer
{
    const TYPE = "Citizen";
    private $name;
    private $age;
    private $id;
    private $birthdate;
    private $buyFood = 0;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function birthdate(): string
    {
        return $this->birthdate;
    }

    public function buyFood(int $food = 10)
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