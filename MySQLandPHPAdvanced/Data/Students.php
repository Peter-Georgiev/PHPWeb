<?php
declare(strict_types=1);

namespace Data;


class Students
{
    private $firstName;
    private $lastName;
    private $studentNumber;

    /**
     * Students constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $studentNumber
     */
    public function __construct(string $firstName, string $lastName, string $studentNumber)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setStudentNumber($studentNumber);
    }

    /**
     * @param string $firstName
     */
    private function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    private function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $studentNumber
     */
    private function setStudentNumber(string $studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }

    /**
     * @return string
     */
    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }
}