<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});


while ("" != $str = trim(fgets(STDIN))) {
    $car = new Ferrari($str);
    echo $car . PHP_EOL;
}
