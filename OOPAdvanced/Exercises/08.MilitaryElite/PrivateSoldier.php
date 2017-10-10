<?php
declare(strict_types=1);

class PrivateSoldier extends Soldier
{
    private $salary;

    public function __construct(int $id, string $firstName, string $lastName, string $salary)
    {
        parent::__construct($id, $firstName, $lastName);
        $this->salary = $salary;
    }

    //Todo setters

    public function __toString()
    {
        return "Name: " . parent::__toString() .
            $this->salary;
    }

    //Todo getters
}