<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($db);

foreach ($shop->getSalesUseMySQLProcedure()->fetch(PDO::FETCH_ASSOC) as $value) {
    echo "Total sales: " . $value;
}
