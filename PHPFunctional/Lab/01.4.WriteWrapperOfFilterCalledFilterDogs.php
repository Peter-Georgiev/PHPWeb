<?php
declare(strict_types=1);

$animals = [
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 2],
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 13]
];

$age = 8;
$youngOrOld = 'young';

$youngDogs = function ($value) use ($age) {
    return $value['type'] == 'dog' && $value['age'] < $age;
};

$oldDogs = function ($value) use ($age) {
    return $value['type'] == 'dog' && $value['age'] > $age;
};


$filter = function (array $input, string $youngOrOld, callable $youngDogs, callable $oldDogs): array {
    $result = [];
    foreach ($input as $value) {
        if (strtolower($youngOrOld) == 'young' && $youngDogs($value) == true) {
            $result[] = $value;
        } elseif (strtolower($youngOrOld) == 'old' && $oldDogs($value) == true) {
            $result[] = $value;
        }
    }
    return $result;
};

$dogsOutput = $filter($animals,$youngOrOld, $youngDogs, $oldDogs);

print_r($dogsOutput);