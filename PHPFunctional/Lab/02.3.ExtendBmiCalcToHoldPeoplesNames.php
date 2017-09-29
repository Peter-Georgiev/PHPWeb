<?php
declare(strict_types=1);

$people = [
    ['name' => 'John', 'weight' => 69, 'height' => 1.69],
    ['name' => 'Peter', 'weight' => 85, 'height' => 1.68],
    ['name' => 'Ivan', 'weight' => 75, 'height' => 1.72],
    ['name' => 'Mitko', 'weight' => 95, 'height' => 1.70]
];

$bmiCalc = array_map(function ($a, $b) {
    return array('name' => $a['name'] ,
        'bmi' => floatval($b['weight']) / (floatval($b['height']) * floatval($b['height'])));
}, // callback
    $people, $people // input array
);

print_r($bmiCalc);