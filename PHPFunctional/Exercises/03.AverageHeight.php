<?php
declare(strict_types=1);

$people = [
    ['name' => 'John', 'height' => 1.65],
    ['name' => 'Peter', 'height' => 1.85],
    ['name' => 'Silvia', 'height' => 1.69],
    ['name' => 'Martin', 'height' => 1.82]
];

$averageHeight = array_reduce($people, // input array
        function ($carry, $item): float {
            return $carry += $item['height'];
        } // callback
    ) / count($people);

echo "Average height is $averageHeight meters";