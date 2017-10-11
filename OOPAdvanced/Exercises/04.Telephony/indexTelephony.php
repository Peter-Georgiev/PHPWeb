<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$input = trim(fgets(STDIN));
foreach (explode(' ', $input) as $value) {
    $call = new Telephony();
    $call->call($value);
}

$input = trim(fgets(STDIN));
foreach (explode(' ', $input) as $value) {
    $web = new Telephony();
    $web->browsing($value);
}