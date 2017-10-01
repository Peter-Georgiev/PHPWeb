<?php
declare(strict_types=1);
/* Problem 02.	Creating Constructor */

class Person
{
    private $name;
    private $age;

    /**
     * Person constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->name . " " . $this->age;
    }
}
$name = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));
$person = new Person($name,$age);
echo $person;
