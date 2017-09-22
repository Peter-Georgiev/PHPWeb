<?php
//error_reporting(E_ALL ^E_NOTICE);

date_default_timezone_set("Europe/Sofia");
$dateNow = date("Y-m-");

printSundays($dateNow);

function printSundays($dateNow){
    for ($i = 0; $i < 30; $i++) {

        $date = $dateNow . "$i";
        $_date = strtotime($date);
        $months = strtolower(date("l", $_date));

        if ($months == 'sunday') {
            echo date('jS F Y', strtotime($date)) . "\n";
        }
    }
}
