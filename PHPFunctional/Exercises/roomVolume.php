<?php
declare(strict_types=1);
/* Problem 04.	Volume of Rooms */

$room = [
    'kithen' => ['width' => 3, 'length' => 2, 'height' => 2.4],
    'living_room' => ['width' => 6, 'length' => 4, 'height' => 2.4],
    'bedroom' => ['width' => 5, 'length' => 3, 'height' => 2.2],
];

print_r(array_map(function (&$value) {
        return $value['width'] * $value['length'] * $value['height'];
    }, // callback
        $room // input array
    )
);