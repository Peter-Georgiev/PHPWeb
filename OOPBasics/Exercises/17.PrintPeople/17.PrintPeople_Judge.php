<?php
declare(strict_types=1);

class Person
{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->name . ' - age: ' . $this->age . ', occupation: ' . $this->occupation;
    }
}

$persons = [];
while ('END' != $input = trim(fgets(STDIN))) {
    $tokens = explode(' ', $input);
    $persons[] = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
}

function personSort($a, $b) {
    return $a->getAge() > $b->getAge();
}

usort($persons, "personSort");

printResult($persons);

function printResult(array $persons) {
    $count = count($persons);
    foreach ($persons as $person) {
        echo $person;
        if ($count > 1) {
            echo PHP_EOL;
        }
        $count--;
    }
}