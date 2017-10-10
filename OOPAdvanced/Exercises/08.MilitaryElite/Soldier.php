<?php
declare(strict_types=1);

class Soldier
{
    private $firstName;
    private $lastName;
    private $id;

    public function __construct(int $id, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "Name: " .
            $this->firstName . " " .
            $this->lastName . " " .
            $this->id;
    }
}