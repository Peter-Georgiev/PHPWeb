<?php
declare(strict_types=1);

class Robot implements IIidentification
{
    private $name;
    private $id;

    public function __construct(string $name, string $id)
    {
        $this->name = $name;
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