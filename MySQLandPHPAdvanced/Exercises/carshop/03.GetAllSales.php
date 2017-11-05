<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($pdo);

$stmt = $shop->getAllSales();

while ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $value["make"] . ', ' . $value["model"] . ', ' .
        $value["date_time_sale"] . ', ' . $value["amount"] . PHP_EOL;
}

echo "-------------" . PHP_EOL;

$stmt = $shop->getTotalSales();
$total = $stmt->fetch(PDO::FETCH_ASSOC);
if ($total) {
    echo "Total: " . $total["total"] . PHP_EOL;
}