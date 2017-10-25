<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($db);

$stmt = $shop->getViewParticularDeal();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
    echo $item["make"] . ',' . $item["model"] . ', ' .
        $item["date_time_sale"] . ', ' . PHP_EOL .
        "Sold to " . $item["first_name"] . ' ' .
        $item["last_name"] . ' for BGN ' .
        $item["amount"] . PHP_EOL . "---" . PHP_EOL;
}

echo "-----------------" . PHP_EOL;

foreach ($shop->getSalesUseMySQLProcedure() as $row) {
    echo "Total: BGN " . $row["total"];
}