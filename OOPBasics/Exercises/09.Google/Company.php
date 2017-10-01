<?php
declare(strict_types=1);

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        $salary = number_format($this->salary, 2);
        return $this->companyName . ' ' . $this->department . ' ' . $salary;
    }
}