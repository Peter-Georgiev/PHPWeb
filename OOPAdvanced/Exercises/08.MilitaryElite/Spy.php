<?php
declare(strict_types=1);

class Spy extends Soldier implements Ispy
{
    private $codeNumber;

    public function __construct($firstName, $lastName, $id, $codeNumber)
    {
        parent::__construct($firstName, $lastName, $id);
        $this->codeNumber = $codeNumber;
    }

    public function getCodeNumber()
    {
        return $this->codeNumber;
    }

    public function __toString()
    {
        return parent::__toString() . PHP_EOL .
            'Code Number: ' . $this->getCodeNumber() . PHP_EOL;
    }
}
