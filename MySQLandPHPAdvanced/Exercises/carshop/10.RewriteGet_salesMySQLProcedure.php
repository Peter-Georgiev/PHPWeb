<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($db);

//input_str = trim(fgets(STDIN));
$input_str = "Sales,   2017-07, 2017-09";
$input_arr = explode(',', $input_str);

if (trim($input_arr[0]) != "Sales") {
    exit("EXIT");
}

$stmt = $shop->getGetSalesForParticularPeriod(trim($input_arr[1]), trim($input_arr[2]));

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
    echo $item["make"] . ',' . $item["model"] . ', ' .
        $item["date_time_sale"] . ', ' . PHP_EOL .
        "Sold to " . $item["first_name"] . ' ' .
        $item["last_name"] . ' for BGN ' .
        $item["amount"] . PHP_EOL . "---" . PHP_EOL;
}