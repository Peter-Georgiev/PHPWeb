<?php
$names = [];
$ages = [];
$count = 4;
$page = 1;
if (isset($_GET["filter"])) {
    //var_dump($_GET);
    $delimiter = $_GET["delimeter"];
    $names = explode($delimiter, $_GET["names"]);
    $ages = explode($delimiter, $_GET["ages"]);
    //var_dump($names);
    //var_dump($ages);
}




include ("02.labFront.php");
