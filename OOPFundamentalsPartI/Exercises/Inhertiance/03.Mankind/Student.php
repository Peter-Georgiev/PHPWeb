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
        return parent::__toString() .
            "Faculty number: " . $this->facultyNumber . PHP_EOL;
    }
}