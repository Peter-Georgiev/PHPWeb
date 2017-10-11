<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$n = intval(fgets(STDIN));
while ($n--) {
    //TODO
}

while ("End" != $input = trim(fgets(STDIN))) {
    //TODO
}