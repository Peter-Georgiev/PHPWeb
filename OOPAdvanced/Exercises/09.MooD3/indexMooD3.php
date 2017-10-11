<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$tokens = explode("|", trim(fgets(STDIN)));

$type = trim($tokens[1]);
$data = null;

switch ($type) {
    case "Demon":
        $data = new Demon(trim($tokens[0]), $type, floatval($tokens[2]), intval($tokens[3]));
        break;
    case "Archangel":
        $data = new Archangel(trim($tokens[0]), $type, floatval($tokens[2]), intval($tokens[3]));
        break;
}

echo $data->username() . " | " . $data->hashedPassword() . " -> " . $data->type() . PHP_EOL;
echo $data->specialPoints();