<?php
declare(strict_types=1);
/* Problem 03. Opinion Poll */

class Person
{
    private $name;
    private $age;

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
}

$tokens = [];

$n = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));
    $person = new Person($input[0], intval($input[1]));

    $tokens[] = $person;
}

$out = array_filter($tokens, function ($var) {
    return $var->getAge() > 30;
});

usort($out, function ($a, $b) {
    return $a->getName() <=> $b->getName();
});


foreach ($out as $value) {
    echo $value->getName() . ' - ' . $value->getAge() . PHP_EOL;
}