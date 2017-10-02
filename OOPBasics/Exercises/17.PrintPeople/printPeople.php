<?php
declare(strict_types=1);
include "Person.php";


$person = null;
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'END'){
        break;
    }

    $tokens = explode(' ', $input);
    $person = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
    $persons[] = $person;
    $person->setPersons($persons);
}

echo $person;