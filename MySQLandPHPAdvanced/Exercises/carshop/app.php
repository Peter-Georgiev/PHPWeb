<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($pdo);

$shop->main();
