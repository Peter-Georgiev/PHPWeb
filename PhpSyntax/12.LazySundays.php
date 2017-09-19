<?php
//error_reporting(E_ALL ^E_NOTICE);

for ($i = 0; $i < 30; $i++) {

    $date = "2017-09-$i";
    $_date = strtotime($date);
    $months = strtolower(date("l", $_date));

    if ($months == 'sunday') {
        echo date('jS F Y', strtotime($date)).'<br>';
    }
}
