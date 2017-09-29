<?php
declare(strict_types=1);

$output = [];

printOutput(insertObjStd($output));

function insertObjStd(array &$output): array {
    $objStd = new stdClass();
    $objStd->firstName = 'Peter';
    $objStd->lastName = 'Georgiev';
    $objStd->homeAddress = 'Karlovo';
    $objStd->homeEmail = 'peter.@gmail.bg';
    $objStd->homePhone = '+359 894 622 954';
    $objStd->businessAddress = 'Karlovo';
    $objStd->businessName = 'Lingvista';
    $objStd->businessEmail = 'peter@lingvista.com';
    $objStd->businessPhone = '+359 894 622 954';
    $objStd->jobs = 'System administrator';
    $output[] = $objStd;
    return $output;
}

function printOutput(array $output): void {
    foreach ($output as $item) {
        echo 'Name: ' . $item->firstName . ' ' . $item->lastName . "\n";
        echo 'Home: ' . $item->homeAddress . ', ' . $item->homeEmail . ', ' . $item->homePhone . "\n";
        echo 'Business: ' . $item->businessName . ', ' . $item->businessAddress . "\n";
        echo "\t\t\t**" . $item->businessEmail . ', ' . $item->businessPhone . "\n";
        echo 'Jobs: ' . $item->jobs;
    }
}

