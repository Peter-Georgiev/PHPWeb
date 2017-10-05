<?php
declare(strict_types=1);

class Person
{
    private $name;
    private $money = 0;
    private $bagOfProducts = [];

    public function __construct(string $name, float $money)
    {
        $this->name = $name;
        $this->money = $money;
    }

    public function setCostBuyProduct(float $setCostBuyProduct)
    {
        $this->money -= $setCostBuyProduct;
    }

    public function addBagProducts(string $bagOfProducts)
    {
        $this->bagOfProducts[] = $bagOfProducts;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMoney(): float
    {
        return $this->money;
    }

    public function getBagOfProducts()
    {
        return $this->bagOfProducts;
    }
}

class Product
{
    private $name;
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}


$dataPerson = readPersonCLI();
$dataProduct = readProductCLI();

while ('END' != $input = trim(fgets(STDIN))) {
    try {
        $tokens = explode(' ', $input);

        $namePerson = $tokens[0];
        $nameProduct = $tokens[1];
        if (!array_key_exists($namePerson, $dataPerson) || !array_key_exists($nameProduct, $dataProduct)) {
            return;
        }

        $buy = $dataPerson[$namePerson]->getMoney() - $dataProduct[$nameProduct]->getCost();
        if ($buy < 0) {
            echo $namePerson . " can't afford " . $nameProduct . PHP_EOL;
            continue;
        }

        $dataPerson[$namePerson]->addBagProducts($nameProduct);
        $dataPerson[$namePerson]->setCostBuyProduct($dataProduct[$nameProduct]->getCost());
        echo $namePerson . ' bought ' . $nameProduct . PHP_EOL;
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

try {
    foreach ($dataPerson as $value) {
        echo $value->getName() . ' - ';
        if (count($value->getBagOfProducts()) > 0) {
            echo implode(",", $value->getBagOfProducts()) . PHP_EOL;
        } else {
            echo "Nothing bought" . PHP_EOL;
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}

function readPersonCLI(): array {
    try {
        $dataPerson = [];
        $input = trim(fgets(STDIN));
        $arr = explode(';', $input);
        for ($i = 0; $i < count($arr); $i++) {
            if (trim($arr[$i]) == '') {
                continue;
            }

            $tokens = explode('=', $arr[$i]);
            $name = trim($tokens[0]);
            $money = floatval($tokens[1]);

            if ($name == '') {
                exit(nameEmpty());
            }

            if ($money < 0) {
                exit(moneyNegative());
            }

            $dataPerson[$name] = new Person($name, $money);
        }
        return $dataPerson;
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

function readProductCLI(): array {
    try {
        $dataPerson = [];
        $input = trim(fgets(STDIN));
        $arr = explode(';', $input);

        for ($i = 0; $i < count($arr); $i++) {
            if (trim($arr[$i]) == '') {
                continue;
            }

            $tokens = explode('=', $arr[$i]);
            $name = trim($tokens[0]);
            $cost = floatval($tokens[1]);

            if ($name == '') {
                exit(nameEmpty());
            }

            if ($cost < 0) {
                exit(moneyNegative());
            }

            $dataPerson[$name] = new Product($name, $cost);
        }
        return $dataPerson;
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

function moneyNegative(): string
{
    return "Money cannot be negative";
}

function nameEmpty(): string
{
    return "Name cannot be empty";
}