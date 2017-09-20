<?php
$firstNane = trim(fgets(STDIN));
$lastName = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));

if ($lastName >= 0) {
    $fullName = $firstNane . ' ' . $lastName;
    echo 'My name is ' . $fullName . ' and I am ' . $age . ' year old.';
} else {
    echo 'My name is ' . $fullName . ' and I am Error - ' . $age . ' year old.';
}

