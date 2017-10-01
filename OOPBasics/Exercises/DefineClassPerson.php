<?php
declare(strict_types=1);
/* Problem 01.	Define a class Person*/

class Person
{
    public $name;
    public $age;
}

$person = new Person();
echo(count(get_object_vars($person)));
