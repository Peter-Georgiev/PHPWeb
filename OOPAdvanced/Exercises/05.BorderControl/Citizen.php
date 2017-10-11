<?php
declare(strict_types=1);

class Citizen implements IIidentification
{
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }

}