<?php
declare(strict_types=1);

class Soldier implements Isoldier
{
    private $firstName;
    private $lastName;
    private $id;

    public function __construct(string $firstName, string $lastName, $id)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return 'Name: ' . $this->getFirstName() . ' ' . $this->getLastName() . ' Id: ' . $this->getId();
    }
}