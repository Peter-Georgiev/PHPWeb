<?php
/* Problem 04.	Volume of Rooms */
declare(strict_types=1);

$room = [
    'kithen' => ['width' => 3, 'length' => 2, 'height' => 2.4],
    'living_room' => ['width' => 6, 'length' => 4, 'height' => 2.4],
    'bedroom' => ['width' => 5, 'length' => 3, 'height' => 2.2],
];

print_r(array_map(function (&$current_room) {
        return $current_room['width'] * $current_room['length'] * $current_room['height'];
    }, // callback
        $room // input array
    )
);