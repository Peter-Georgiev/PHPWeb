<?php
declare(strict_types=1);

class PrivateSoldier extends Soldier
{
    private $salary;

    public function __construct(string $firstName, string $lastName, $id, float $salary)
    {
        parent::__construct($firstName, $lastName, $id);
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function __toString()
    {
        return parent::__toString() . ' Salary: ' . number_format($this->getSalary(), 2, '.', '') . PHP_EOL;
    }
}