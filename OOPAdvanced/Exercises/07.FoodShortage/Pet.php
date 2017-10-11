<?php
declare(strict_types=1);

class Pet implements IIidentification, IInfoCitizen
{
    private $name;
    private $birthdate;

    public function __construct(string $name, string $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return "";
    }

    public function birthdate()
    {
        return $this->birthdate;
    }
}