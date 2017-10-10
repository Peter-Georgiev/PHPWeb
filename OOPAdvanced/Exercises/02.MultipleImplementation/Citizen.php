<?php
declare(strict_types=1);

class Citizen implements Person, Identifiable, Birthable
{
    private $name;
    private $age;
    private $birthDate;
    private $id;

    public function __construct(string $name, int $age, float $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setId(float $id)
    {
        $this->id = $id;
    }

    public function setBirthdate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return $this->name . ', ' . $this->age . ', ID = ' .
            $this->id . ', ' . $this->birthDate;
    }
}