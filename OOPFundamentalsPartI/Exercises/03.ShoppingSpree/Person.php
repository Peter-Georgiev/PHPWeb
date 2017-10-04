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

    public function setBagOfProducts($bagOfProducts)
    {
        $this->bagOfProducts = $bagOfProducts;
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