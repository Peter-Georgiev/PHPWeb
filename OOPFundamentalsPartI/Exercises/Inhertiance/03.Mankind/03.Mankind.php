<?php
declare(strict_types=1);

class Human
{
    private $firstName;
    private $lastName;

    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return 'First Name: ' . $this->firstName . PHP_EOL .
            'Last Name: ' . $this->lastName . PHP_EOL;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firsName, string $lastName, string $facultyNumber)
    {
        parent::setFirstName($firsName);
        parent::setLastName($lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    private function setFacultyNumber(string $facultyNumber)
    {
        if (strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10) {
            throw new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return parent::__toString() .
            "Faculty number: " . $this->facultyNumber . PHP_EOL;
    }
}

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
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    private function setWeekSalary(float $weekSalary)
    {
        if ($weekSalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    private function setWorkHoursPerDay(float $workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
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

try {
    $firstLine = explode(' ', trim(fgets(STDIN)));
    $student = new Student($firstLine[0], $firstLine[1], $firstLine[2]);

    $secondLine = explode(' ', trim(fgets(STDIN)));
    $worker = new Worker($secondLine[0], $secondLine[1], floatval($secondLine[2]), floatval($secondLine[3]));

    echo $student . PHP_EOL . $worker;
} catch (Exception $e){
    echo $e->getMessage();
}