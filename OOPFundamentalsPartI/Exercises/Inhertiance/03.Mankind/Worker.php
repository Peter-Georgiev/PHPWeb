<?php
declare(strict_types=1);

class Worker extends Human
{
    private $weekSalary;
    private $workHoursPerDay;

    public function __construct(string $firstName, string $lastName, float $weekSalary, float $workHoursPerDay)
    {
        parent::setFirstName($firstName);
        parent::setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) <= 3) {
            exit("Expected length more than 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    private function setWeekSalary(float $weekSalary)
    {
        if ($weekSalary <= 10) {
            exit("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    private function setWorkHoursPerDay(float $workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            exit("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    private function getSalary(): string
    {
        $salary = number_format((($this->weekSalary / 7)  / $this->workHoursPerDay), 2, '.', '');
        return $salary;
    }

    public function __toString()
    {
        return "First Name: " . parent::getFirstName() . PHP_EOL .
            "Last Name: " . parent::getLastName() . PHP_EOL .
            "Week Salary: " .
            number_format($this->weekSalary, 2, '.', '')
            . PHP_EOL .
            "Hours per day: " .
            number_format($this->workHoursPerDay, 2, '.', '')
            . PHP_EOL .
            "Salary per hour: " . $this->getSalary();
    }
}