<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$data = [];
$n = intval(fgets(STDIN));
while ($n--) {
    $tokens = explode(' ', trim(fgets(STDIN)));

    $name = $tokens[0];
    if (count($tokens) == 4) {
        $data[$name] = new Citizen($name, intval($tokens[1]), $tokens[2], $tokens[3]);
    } elseif (count($tokens) == 3) {
        $data[$name] = new Rebel($name, intval($tokens[1]), $tokens[2]);
    }
}

while ("End" != $input = trim(fgets(STDIN))) {
    if (!array_key_exists($input, $data)) {
        continue;
    }
    $data[$input]->buyFood();
}

printResult($data);

function printResult(array $data){
    $count = 0;
    foreach ($data as $datum) {
        $count += $datum->getBuyFood();

    }

    echo $count . " units food";
}

