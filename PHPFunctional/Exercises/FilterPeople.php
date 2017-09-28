<?php
/* Problem 02.	Filter Tall People */
declare(strict_types=1);

$people = [
    ['name' => 'John', 'height' => 1.65],
    ['name' => 'Peter', 'height' => 1.85],
    ['name' => 'Silvia', 'height' => 1.69],
    ['name' => 'Martin', 'height' => 1.82]
];

print_r(array_filter($people, //input array
    function ($kvp): bool {
        return $kvp['height'] > 1.80;
    } //callback
));