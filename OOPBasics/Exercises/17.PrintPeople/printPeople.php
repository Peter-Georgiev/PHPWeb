<?php
declare(strict_types=1);
include "Person.php";

$persons = [];
while ('END' != $input = trim(fgets(STDIN))) {
    $tokens = explode(' ', $input);
    $persons[] = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
}

function personSort($a, $b) {
    return $a->getAge() > $b->getAge();
}

usort($persons, "personSort");

printResult($persons);

function printResult(array $persons) {
    $count = count($persons);
    foreach ($persons as $person) {
        echo $person;
        if ($count > 1) {
            echo PHP_EOL;
        }
        $count--;
    }
}

