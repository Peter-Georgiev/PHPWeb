<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

$db = new \Adapter\PDODatabase(
    \Config\DBConfig::DB_HOST,
    \Config\DBConfig::DB_NAME,
    \Config\DBConfig::DB_USER,
    \Config\DBConfig::DB_PASSWORD
);

while ("end" != $readCLI = trim(fgets(STDIN))) {
    $tokens = [];
    foreach (explode(' ', $readCLI) as $item) {
        $item = trim($item);
        if (strlen($item) > 0) {
            $tokens[] = $item;
        }
    }
    unset($item);

    $db->prepare();
}