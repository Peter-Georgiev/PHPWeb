<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$data = [];
while ("End" != $input = trim(fgets(STDIN))) {
    $tokens = explode(" ", $input);
    $type = $tokens[0];

    if ($type == "Citizen"){
        $data[] = new Citizen($tokens[1], intval($tokens[2]), $tokens[3], $tokens[4]);
    } elseif ($type == "Robot") {
        //$data[] = new Robot($tokens[1], $tokens[2]);
    } elseif ($type == "Pet") {
        $data[] = new Pet($tokens[1], $tokens[2]);
    }
}

$input = trim(fgets(STDIN));
searchPrintResult($data, $input);

function searchPrintResult(array $data, string $input) {
    $isEmpty = true;
    foreach ($data as $item) {
        $year = explode( '/', trim($item->birthdate()));
        if ($input == trim($year[2])) {
            $isEmpty = false;
            echo $item->birthdate() . PHP_EOL;
        }
    }

    if ($isEmpty) {
        echo "<no output>";
    }
}