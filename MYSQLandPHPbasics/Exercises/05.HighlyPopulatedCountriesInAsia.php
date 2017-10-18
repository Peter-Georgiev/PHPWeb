<?php
declare(strict_types=1);
include "geography_db.php";
include "MyPDO.php";

$stmt = null;
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_username, $db_password);
    $db->setErrorException(); // Throw exception on all errors

    $stmt = $db->query("SELECT `a`.`country_name`
        FROM `countries` AS `a`, `continents` AS `b` 
	      WHERE `a`.`continent_code` = `b`.`continent_code`
            AND `a`.`population` > 1000000000");

    $db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $i => $country) {
    echo $country["country_name"] . PHP_EOL;
}