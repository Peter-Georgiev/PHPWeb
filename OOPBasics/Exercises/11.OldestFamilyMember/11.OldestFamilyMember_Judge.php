<?php
declare(strict_types=1);

class Family
{
    private $members = [];
    private $oldestMember = null;

    public function addMember(Person $member)
    {
        $this->members[] = $member;

        if ($this->oldestMember == null ||
            $member->getAge() > $this->oldestMember->getAge()) {
            $this->oldestMember = $member;
        }
    }

    public function Getoldestmember(): Person
    {
        return $this->oldestMember;
    }
}

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->age;
    }
}

$family = new Family();

$n = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $n; $i++) {
    $namesAndNumbers = explode(" ", trim(fgets(STDIN)));
    $name = $namesAndNumbers[0];
    $age = intval($namesAndNumbers[1]);

    $member = new Person($name, $age);
    $family->addMember($member);
}

echo $family->Getoldestmember();