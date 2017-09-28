<?php
declare(strict_types=1);

$animals = [
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 2],
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 5]
];

$age = 8;

$youngDogs = function ($value) use ($age) {
    return $value['type'] == 'dog' && $value['age'] < $age;
};

$filter = function (array $input, callable $youngDogs): array {
    $result = [];
    foreach ($input as $value) {
        if ($youngDogs($value) == true) {
            $result[] = $value;
        }
    }
    return $result;
};

$dogsOutput = $filter($animals, $youngDogs);

print_r($dogsOutput);