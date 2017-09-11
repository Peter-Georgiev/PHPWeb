<?php
$month = date("F");
$year = date("Y");
$totalDays = date("t");

$d = date("jS F, Y");
echo $d;
$is_sunday = date('l', $d) == 'Sunday';
var_dump($is_sunday);