<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$myCitizen = new Citizen("Peter", 25, 7706126789, "12.06.1977");
echo $myCitizen;