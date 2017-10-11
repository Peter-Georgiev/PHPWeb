<?php
declare(strict_types=1);

class Citizen implements IIidentification, IInfoCitizen
{
    private $name;
    private $age;
    private $id;
    private $birthdate;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }

    public function birthdate()
    {
        return $this->birthdate;
    }
}