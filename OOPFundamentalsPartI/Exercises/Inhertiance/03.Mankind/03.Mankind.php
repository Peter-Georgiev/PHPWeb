<?php
declare(strict_types=1);

class Human
{
    private $firstName;
    protected $lastName;

    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            exit("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4) {
            exit("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            exit("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3) {
            exit("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    protected function getFirstName()
    {
        return $this->firstName;
    }

    protected function getLastName()
    {
        return $this->lastName;
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
            exit("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return "First Name: " . parent::getFirstName() . PHP_EOL .
            "Last Name: " . parent::getLastName() . PHP_EOL .
            "Faculty number: " . $this->facultyNumber . PHP_EOL;
    }
}

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

$firstLine = explode(' ', trim(fgets(STDIN)));
$student = new Student($firstLine[0], $firstLine[1], $firstLine[2]);
unset($firstLine);

$secondLine = explode(' ', trim(fgets(STDIN)));
$worker = new Worker($secondLine[0], $secondLine[1], floatval($secondLine[2]), floatval($secondLine[3]));
unset($secondLine);

echo $student . PHP_EOL;
echo $worker;
