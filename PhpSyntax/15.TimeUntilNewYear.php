<?php
$today = getdate();

$symbol = setSymbol();

timeUntilNewYear($today, $symbol);

function timeUntilNewYear($today, $symbol){
    $todayNow =
        $today['mday'].'-'.
        $today['mon'].'-'.
        $today['year'].' '.
        $today['hours'].':'.
        $today['minutes'].':'.
        $today['seconds'];

    $strNewYear = '31-12-' . $today['year'] . ' 23:59:59';

    $currentDate = new DateTime($todayNow, new DateTimeZone('Europe/Sofia'));
    $newYear = new DateTime($strNewYear, new DateTimeZone('Europe/Sofia'));

    $diff = $newYear->diff($currentDate);

    $second = ((($diff->days * 24 + $diff->h) * 60 + $diff->i) * 60) + $diff->s;
    $minute = (int)($second / 60);
    $hour = (int)($second / 60 /60);

    echo 'Hours until new year : ' . $hour . $symbol;
    echo 'Minutes until new year : ' . $minute . $symbol;
    echo 'Seconds until new year : ' . $second . $symbol;
    echo 'Days:Hours:Minutes:Seconds ' . $diff->days . ':' . $diff->h . ':' . $diff->i . ':' . $diff->s;
}

function setSymbol(){
    if (isset($_SERVER['HTTP_USER_AGENT'])){
        return '<br/>';
    } else {
        return "\n";
    }
}
