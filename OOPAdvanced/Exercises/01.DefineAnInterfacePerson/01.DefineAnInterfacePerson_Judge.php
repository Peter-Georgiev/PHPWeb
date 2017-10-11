<?php
declare(strict_types=1);

interface Person
{
    public function setName(string $name);

    public function setAge(int $age);
}

class Citizen implements Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->name . PHP_EOL .
            $this->age;
    }
}

$tokens = [];
for ($i = 0; $i < 2; $i++) {
    $tokens[] = trim(fgets(STDIN));
}

$data = new Citizen($tokens[0], intval($tokens[1]));
echo $data;