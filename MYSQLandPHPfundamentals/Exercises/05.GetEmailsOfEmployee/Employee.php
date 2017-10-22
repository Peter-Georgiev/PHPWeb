<?php
declare(strict_types=1);

class Employee
{
    private $id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $department;
    private $position;
    private $pasportID;
    private $email = [];

    public function __construct(string $first_name, string $middle_name,
                                string $last_name, array $email = array(), string $department = null,
                                string $position = null, string $pasportID = null)
    {
        $this->setFirstName($first_name);
        $this->setMiddleName($middle_name);
        $this->setLastName($last_name);
        $this->setDepartment($department);
        $this->setPosition($position);
        $this->setPasportID($pasportID);
        $this->setEmail($email);
    }

    /**
     * @param PDO $db
     */
    public function insertEmployee(PDO $db)
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
    }

    /**
     * @param PDO $db
     */
    public function checkAndGetPersonNameUnique(PDO $db): array
    {
        $stmt = $db->prepare('SELECT id FROM employees
                    WHERE first_name = ?
                      AND middle_name = ?
                      AND last_name = ?'
        );

        $stmt->execute(array(
            $this->getFirstName(),
            $this->getMiddleName(),
            $this->getLastName()
        ));

        $arr = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $value) {
            $arr[] = $value['id'];
        }
        return $arr;
    }

    /**
     * @param PDO $db
     */
    public function insertNames(PDO $db): bool
    {
        $stmt = $db->prepare('INSERT INTO `employees` 
                    (first_name, middle_name, last_name) 
                  VALUES (?, ?, ?)'
        );

        $stmt->execute(array(
            $this->getFirstName(),
            $this->getMiddleName(),
            $this->getLastName(),
        ));

        $this->setId(intval($db->lastInsertId()));

        if ($this->getId() == 0) {
            return false;
        }
        return true;
    }

    /**
     * @param PDO $db
     */
    public function insertEmail(PDO $db, int $email_id = 0): bool
    {
        $stmt = $db->prepare('INSERT INTO employee_emails 
                    (id, email, email_type)
                    VALUES (?, ?, ?)');

        if ($email_id > 0) {
            $this->setId($email_id);
        }

        try {
            foreach ($this->getEmail() as $email_type => $emails) {
                if (count($emails) == 0) {
                    continue;
                }

                foreach ($emails as $email) {
                    $stmt->execute(array(
                        $this->getId(),
                        $email,
                        $email_type
                    ));
                }
            }
        } catch (Exception $e) {
            return false;
        }
        $this->setId(0);
        return true;
    }

    /**
     * @param PDO $db
     */
    public function exists(PDO $db, int $id = 0): bool
    {
        $stmt = $db->prepare('SELECT id, first_name, middle_name, last_name, passportID
              FROM employees 
              WHERE id = ? 
              AND first_name = ?
              AND middle_name = ?
              AND last_name = ?'
        );

        $stmt->execute(array(
            $id,
            $this->getFirstName(),
            $this->getMiddleName(),
            $this->getLastName()
        ));

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
            return true;
        };
        return false;
    }

    /**
     * @param PDO $db
     */
    public function getInfo(PDO $db)
    {
        $stmt = $db->prepare('SELECT e.id, e.first_name, e.middle_name, 
            e.last_name, e.department, e.position, em.email_type, em.email
            FROM employees AS e
            JOiN employee_emails AS em
              ON e.id = em.id
            WHERE first_name = ?
              AND last_name = ?'
        );

        $stmt->execute(array(
            $this->getFirstName(),
            $this->getLastName()
        ));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
     * @param array $email
     */
    private function setEmail(array $email)
    {
        if (count($email) > 0) {
            foreach ($email as $key => $item) {
                if (count($item) == 0) {
                    continue;
                }

                foreach ($item as $value) {
                    if (!array_key_exists($key, $this->email)) {
                        $this->email[$key][] = $value;
                        continue;
                    }
                    $this->email[$key][] = $value;
                }
            }
        }
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
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
    private function getPasportID()
    {
        return $this->pasportID;
    }

    /**
     * @return array
     */
    private function getEmail(): array
    {
        return $this->email;
    }

    /**
     * @return int
     */
    private function getId(): int
    {
        return $this->id;
    }
}