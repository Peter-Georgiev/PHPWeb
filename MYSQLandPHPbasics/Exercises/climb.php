<?php
declare(strict_types=1);
//Problem 6. High Peaks in the Andes
include "geography_db.php";
include "MyPDO.php";

$continents = null;
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_username, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $continents = $db->query("
                SELECT `peak_name`, `elevation` 	FROM `peaks`
                  WHERE  `elevation` > 6700 AND `mountain_id` = 3");
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}

foreach ($continents->fetchAll(PDO::FETCH_ASSOC) as $i => $continent) {
    echo $continent["peak_name"] . ',' . $continent["elevation"] . PHP_EOL;
}
