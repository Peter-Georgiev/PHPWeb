<?php
declare(strict_types=1);

interface Identifiable
{
    public function setId(string $id);
}
interface Person
{
    public function setName(string $name);

    public function setAge(int $age);
}
interface Birthable
{
    public function setBirthdate(string $birthDate );
}


class Citizen implements Person, Identifiable, Birthable
{
    private $name;
    private $age;
    private $birthDate;
    private $id;

    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function setBirthdate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return $this->name . PHP_EOL .
            $this->age . PHP_EOL .
            $this->id . PHP_EOL .
            $this->birthDate;
    }
}

$tokens = [];
for ($i = 0; $i < 4; $i++) {
    $tokens[] = trim(fgets(STDIN));
}

$myCitizen = new Citizen($tokens[0], intval($tokens[1]), $tokens[2], $tokens[3]);
echo $myCitizen;