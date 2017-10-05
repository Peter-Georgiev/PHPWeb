<?php
declare(strict_types=1);

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