<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$data = [];
while ("End" != $input = trim(fgets(STDIN))) {
    $tokens = explode(" ", $input);

    if (count($tokens) == 3){
        $data[$tokens[0]] = new Citizen($tokens[0], intval($tokens[1]), $tokens[2]);
    } elseif (count($tokens) == 2) {
        $data[$tokens[0]] = new Robot($tokens[0], $tokens[1]);
    }
}

$input = intval(fgets(STDIN));
foreach ($data as $key => $value) {
    if (preg_match( '/' . $input . '$/', $value->id(), $regex)) {
        echo $value->id() . PHP_EOL;
    }
}