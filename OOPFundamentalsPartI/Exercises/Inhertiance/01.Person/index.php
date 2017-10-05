<?php
declare(strict_types=1);
include "Person.php";
include "Child.php";

$data = [];

try {
    $child =
    $data[] = new Child('Pesho', 15);
    
} catch (Exception $e) {
    echo $e->getMessage();
}

foreach ($data as $d) {
    echo $d->getName() . " " . $d->getAge() . PHP_EOL;
}