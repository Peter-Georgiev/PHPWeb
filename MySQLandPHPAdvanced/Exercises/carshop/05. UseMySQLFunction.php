<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($pdo);

foreach ($shop->getSalesUseMySQLFunction() as $row) {
    echo "Full name: " . $row["full_name"] . PHP_EOL;
}
