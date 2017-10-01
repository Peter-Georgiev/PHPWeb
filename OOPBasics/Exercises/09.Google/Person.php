<?php
declare(strict_types=1);

class Person
{
    private $personName;
    private $company = null;
    private $pokemon = [];
    private $parent = [];
    private $children = [];
    private $car = null;

    public function __construct(string $personName)
    {
        $this->personName = $personName;
    }

    /**
     * @param string $personName
     */
    public function setPersonName(string $personName)
    {
        $this->personName = $personName;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @param Pokemon $pokemon
     */
    public function setPokemon(Pokemon $pokemon)
    {
        $this->pokemon[] = $pokemon;
    }

    /**
     * @param Parents $parent
     */
    public function setParent(Parents $parent)
    {
        $this->parent[] = $parent;
    }

    /**
     * @param Children $children
     */
    public function setChildren(Children $children)
    {
        $this->children[] = $children;
    }

    /**
     * @param Car $car
     */
    public function setCar(Car $car)
    {
        $this->car = $car;
    }

    public function __toString()
    {
        return $this->personName . PHP_EOL .
            'Company:' . PHP_EOL .
            ($this->company == null ? '' : $this->company . PHP_EOL) .
            'Car:' . PHP_EOL .
            ($this->car == null ? '' : $this->car . PHP_EOL) .
            'Pokemon:' .PHP_EOL .
            (count($this->pokemon) == 0 ? '' : implode(PHP_EOL, $this->pokemon) .PHP_EOL) .
            'Parents:' . PHP_EOL .
            (count($this->parent) == 0 ? '' : implode(PHP_EOL, $this->parent) . PHP_EOL) .
            'Children:' .
            (count($this->children) == 0 ? '' : PHP_EOL . implode(PHP_EOL, $this->children));
    }
}