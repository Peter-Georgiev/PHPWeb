<?php
declare(strict_types=1);

class Employee
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $department;
    private $position;
    private $pasportID;

    public function __construct(string $first_name, string $middle_name,
                                string $last_name, string $department,
                                string $position, string $pasportID)
    {
        $this->setFirstName($first_name);
        $this->setMiddleName($middle_name);
        $this->setLastName($last_name);
        $this->setDepartment($department);
        $this->setPosition($position);
        $this->setPasportID($pasportID);
    }

    /**
     * @param PDO $db
     */
    public function insertEmployee(PDO $db): bool
    {
        $stmt = $db->prepare('INSERT INTO `employees` 
            (first_name, middle_name, last_name, department, position, passportID) 
            VALUES (?, ?, ?, ?, ?, ?)'
        );

        $stmt->execute(array(
            $this->getFirstName(),
            $this->getMiddleName(),
            $this->getLastName(),
            $this->getDepartment(),
            $this->getPosition(),
            $this->getPasportID()
        ));
        if ($db->lastInsertId() > 0) {
            return true;
        }
        return false;
    }

    /**
     * @param string $first_name
     */
    private function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $middle_name
     */
    private function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
    }

    /**
     * @param string $last_name
     */
    private function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param string $department
     */
    private function setDepartment($department)
    {
        if ($department != null) {
            $this->department = $department;
        }
    }

    /**
     * @param string $position
     */
    private function setPosition($position)
    {
        if ($position != null) {
            $this->position = $position;
        }
    }

    /**
     * @param string $pasportID
     */
    private function setPasportID($pasportID)
    {
        if ($pasportID != null) {
            $this->pasportID = $pasportID;
        }
    }

    /**
     * @return string
     */
    private function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    private function getMiddleName(): string
    {
        return $this->middle_name;
    }

    /**
     * @return string
     */
    private function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    private function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    private function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    private function getPasportID(): string
    {
        return $this->pasportID;
    }
}