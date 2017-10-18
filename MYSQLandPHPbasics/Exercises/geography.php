<?php
declare(strict_types=1);
include "geography_db.php";
include "MyPDO.php";

$db = null;
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_username, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    //$db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

// Problem 4. List the Continents
$stmt = $db->query("SELECT * FROM `continents`");
$db->setErrorException();

echo "Problem 4. List the Continents" . PHP_EOL;
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $i => $continent) {
    if ($i > 0) {
        echo ", ";
    }
    echo $continent["continent_name"] . ' (' . $continent["continent_code"] . ')';
}

// Problem 5. Highly Populated Countries in Asia
$stmt = null; // Close connection
$stmt = $db->query("SELECT `a`.`country_name`
      FROM `countries` AS `a`, `continents` AS `b` 
        WHERE `a`.`continent_code` = `b`.`continent_code`
        AND `a`.`population` > 1000000000");
$db->setErrorException();

echo PHP_EOL . "Problem 5. Highly Populated Countries in Asia";
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $i => $country) {
    echo PHP_EOL . $country["country_name"];
}

// Problem 6. High Peaks in the Andes
$stmt = null;
$stmt = $db->query("SELECT `peak_name`, `elevation` 
        FROM `peaks`
          WHERE  `elevation` > 6700 
          AND `mountain_id` = 3");
$db->setErrorException();

echo PHP_EOL . "Problem 6. High Peaks in the Andes";
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $i => $continent) {
    echo PHP_EOL . $continent["peak_name"] . ',' . $continent["elevation"];
}
