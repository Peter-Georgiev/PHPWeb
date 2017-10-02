<?php
declare(strict_types=1);
include "Person.php";
include "Family.php";

$family = new Family();

$n = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $n; $i++) {
    $namesAndNumbers = explode(" ", trim(fgets(STDIN)));
    $name = $namesAndNumbers[0];
    $age = intval($namesAndNumbers[1]);

    $member = new Person($name, $age);
    $family->addMember($member);
}

echo $family->Getoldestmember();