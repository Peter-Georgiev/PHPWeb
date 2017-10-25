<?php
declare(strict_types=1);
include "db_config.php";
include "Carshop.php";

$shop = new Carshop($db);


$shop->main();