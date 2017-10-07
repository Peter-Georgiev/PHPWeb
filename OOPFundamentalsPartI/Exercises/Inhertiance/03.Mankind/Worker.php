<?php
declare(strict_types=1);

class Worker extends Human
{
    private $weekSalary;
    private $workHoursPerDay;
    private $salaryPerHour;

    public function __construct(string $firstName, string $lastName,
                                float $weekSalary, float $workHoursPerDay)
    {
        parent::setFirstName($firstName);
        parent::setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
        $this->salaryPerHour = $this->setSalaryPerHour();
    }

    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) <= 3) {
            exit("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
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

    private function setSalaryPerHour(): string
    {
        return number_format($this->weekSalary / (7  * $this->workHoursPerDay),
            2,
            '.',
            '');
    }

    private function getWeekSalary()
    {
        return number_format($this->weekSalary, 2, '.', '');
    }

    private function getWorkHoursPerDay()
    {
        return number_format($this->workHoursPerDay, 2, '.', '');
    }


    public function __toString()
    {
        return parent::__toString() .
            'Week Salary: ' . $this->getWeekSalary() . PHP_EOL .
            'Hours per day: ' . $this->getWorkHoursPerDay() . PHP_EOL .
            'Salary per hour: ' . $this->salaryPerHour . PHP_EOL;
    }
}