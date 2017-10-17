<?php
declare(strict_types=1);

class Employee
{
    private $first_name;
    private $last_name;
    private $studen_number;
    private $phone = null;

    /**
     * Employee constructor.
     * @param string $first_name
     * @param string $last_name
     * @param int $studen_number
     * @param string $phone
     */
    public function __construct(string $first_name, string $last_name, int $studen_number, string $phone = "")
    {
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setStudenNumber($studen_number);
        $this->setPhone($phone);
    }

    /**
     * @param string $first_name
     */
    private function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    private function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param int $studen_number
     */
    private function setStudenNumber(int $studen_number)
    {
        $this->studen_number = $studen_number;
    }

    /**
     * @param string $phone
     */
    private function setPhone(string $phone)
    {
        if (strlen($phone) > 0) {
            $this->phone = $phone;
        }
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return int
     */
    public function getStudenNumber(): int
    {
        return $this->studen_number;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->phone;
    }
}