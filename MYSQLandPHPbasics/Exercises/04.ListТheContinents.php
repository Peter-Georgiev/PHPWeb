<?php
declare(strict_types=1);
include "geography_db.php";
include "MyPDO.php";

$continents = null;
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_username, $db_password);
    $db->setErrorException(); // Throw exception on all errors

    $continents = $db->query("SELECT * FROM `continents`");

    $db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

foreach ($continents->fetchAll(PDO::FETCH_ASSOC) as $i => $continent) {
    if ($i > 0) {
        echo ", ";
    }
    echo $continent["continent_name"] . ' (' . $continent["continent_code"] . ')';
}