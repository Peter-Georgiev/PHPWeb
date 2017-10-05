<?php
declare(strict_types=1);
include "Book.php";
include "GoldenEditionBook.php";
//error_reporting(E_ALL^E_NOTICE);


$cli = [];
for ($i = 0; $i < 4; $i++) {
    //$cli[] = trim(fgets(STDIN));
}

$cli = [
    'Ivo Indonov',
    'Un werwerwer   ',
    '10',
    'STANDARD'
];

$data = null;
if ($cli[3] == 'STANDARD') {
    $data = new Book($cli[0], $cli[1], floatval($cli[2]));
} elseif ($cli[3] == 'GOLD') {
    $data = new GoldenEditionBook($cli[0], $cli[1], floatval($cli[2]));
} else {
    exit("Type is not valid!");
}

echo $data;