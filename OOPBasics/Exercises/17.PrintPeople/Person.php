<?php
declare(strict_types=1);

class Person
{
    private $name;
    private $age;
    private $occupatioin;
    private $persons = [];

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    public function setAge(inp $age)
    {
        $this->age = $age;
    }

    /**
     * @param mixed $occupatioin
     */
    public function setOccupatioin(string $occupatioin)
    {
        $this->occupatioin = $occupatioin;
    }

    public function setPersons(array $persons)
    {
        $this->persons = $persons;
    }

    private function personsSort()
    {
        usort($this->persons, function($a, $b)
        {
            if ($a->age < $b->age){
                return 0;
            }
            return ($a->age < $b->age) ? -1 : 1;
        });
    }

    public function __toString()
    {
        $this->personsSort();
        $print = '';
        foreach ($this->persons as $person) {
            $print .= $person['name'] . ' - age: ' . $person['age'] .
                'occupatioin: ' . $person['occupatioin'] . PHP_EOL;

        }

        return $print;
    }
}