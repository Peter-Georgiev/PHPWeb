<?php
declare(strict_types=1);

$animals = [
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
];
$age = 9;
$type =  'dog';

$youngDogs = function ($value) use ($type, $age){
    return $value['type'] == $type && $value['age'] < $age;
};

print_r(array_filter($animals, $youngDogs));