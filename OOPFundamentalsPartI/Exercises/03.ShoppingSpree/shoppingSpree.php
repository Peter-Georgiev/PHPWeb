<?php
declare(strict_types=1);
include "Person.php";
include "Product.php";

$dataPerson = readPersonCLI();
$dataProduct = readProductCLI();

while ('END' != $input = trim(fgets(STDIN))) {
    $tokens = explode(' ', $input);
    $namePerson = $tokens[0];
    $nameProduct = $tokens[1];

    $buy = $dataPerson[$namePerson]->getMoney() - $dataProduct[$nameProduct]->getCost();
    if($buy < 0) {
        echo $namePerson . " can't afford " . $nameProduct . PHP_EOL;
        continue;
    }

    $dataPerson[$namePerson]->addBagProducts($nameProduct);
    $dataPerson[$namePerson]->setCostBuyProduct($dataProduct[$nameProduct]->getCost());
    echo $namePerson . ' bought ' . $nameProduct . PHP_EOL;


}

foreach ($dataPerson as $value) {
    echo $value->getName() . ' - ';
    if (count($value->getBagOfProducts()) > 0) {
        echo implode(",", $value->getBagOfProducts()) . PHP_EOL;
    } else {
        echo "Nothing bought";
    }
}

function readPersonCLI() {
    $dataPerson = [];
    $input = trim(fgets(STDIN));
    $arr = explode(';', $input);
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == '') {
            continue;
        }

        $tokens = explode('=', $arr[$i]);
        $name = $tokens[0];
        $money = floatval($tokens[1]);

        if ($name == '') {
            exit(nameEmpty());
        }

        if ($money < 0) {
            exit(moneyNegative());
        }

        $person = new Person($name, $money);
        $dataPerson[$name] = $person;
    }
    return $dataPerson;
}

function readProductCLI() {
    $dataPerson = [];
    $input = trim(fgets(STDIN));
    $arr = explode(';', $input);

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == '') {
            continue;
        }
        $tokens = explode('=', $arr[$i]);
        $name = $tokens[0];
        $cost = floatval($tokens[1]);

        if ($name == '') {
            exit(nameEmpty());
        }

        if ($cost < 0) {
            exit(moneyNegative());
        }

        $person = new Product($name, $cost);
        $dataPerson[$name] = $person;
    }
    return $dataPerson;
}

function moneyNegative(): string {
    return "Money cannot be negative";
}

function nameEmpty(): string {
    return "Name cannot be empty";
}