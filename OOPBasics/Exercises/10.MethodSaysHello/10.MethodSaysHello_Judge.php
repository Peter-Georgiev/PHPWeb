<?php
declare(strict_types=1);

class Person
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        echo $this->name . " says \"Hello\"!";
    }
}

$name = trim(fgets(STDIN));
$person = new Person($name);

$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));

if ($fields != 1 || $methods != 1) {
    throw new Exception("Too many fields or methods");
}
