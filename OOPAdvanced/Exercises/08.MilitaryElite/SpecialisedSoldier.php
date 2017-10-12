<?php
declare(strict_types=1);

class SpecialisedSoldier extends PrivateSoldier
{
    private $corps;
    public function __construct(string $firstName, string $lastName, $id, float $salary, string $corps)
    {
        parent::__construct($firstName, $lastName, $id, $salary);
        $this->corps = $corps;
    }
    public function getCorps()
    {
        return $this->corps;
    }
    public function __toString()
    {
        return parent::__toString() . 'Corps: ' . $this->getCorps() . PHP_EOL;
    }
}