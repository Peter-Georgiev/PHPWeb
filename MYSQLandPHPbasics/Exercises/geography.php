<?php
declare(strict_types=1);
//include "db_cofig.php";
include "geography_db.php";
include "MyPDO.php";
$continents = null; // Close connection
$db = null;
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_username, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $continents = $db->query("SELECT * FROM `continents`");
    //$db = null;

} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

foreach ($continents->fetchAll(PDO::FETCH_ASSOC) as $i => $continent) {
    if ($i > 0) {
        echo ", ";
    }
    echo $continent["continent_name"] . ' (' . $continent["continent_code"] . ')';
}

$stmt = $db->query("SELECT `a`.`country_name`
  FROM `countries` AS `a`, `continents` AS `b` 
	WHERE `a`.`continent_code` = `b`.`continent_code`
    AND `a`.`population` > 1000000000");
$db->setErrorException();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $i => $country) {
    echo PHP_EOL . $country["country_name"];
}