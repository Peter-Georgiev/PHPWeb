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

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        $salary = number_format($this->salary, 2);
        return $this->companyName . ' ' . $this->department . ' ' . $salary;
    }
}

class Pokemon
{
    private $pokemonName;
    private $pokemonType;

    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }

    public function __toString()
    {
        return $this->pokemonName . ' ' . $this->pokemonType;
    }
}

class Parents
{
    private $parentName;
    private $parentBirthday;

    public function __construct(string $parentName, string $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }

    public function __toString()
    {
        return $this->parentName . ' ' . $this->parentBirthday;
    }
}

class Children
{
    private $childName;
    private $childBithday;

    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBithday = $childBirthday;
    }

    public function __toString()
    {
        return $this->childName . ' ' . $this->childBithday;
    }
}

class Car
{
    private $carModel;
    private $carSpeed;

    public function __construct(string $carModel, float $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }

    public function __toString()
    {
        return $this->carModel . ' ' . $this->carSpeed;
    }
}

$data = [];
readCLI($data);

$searchPersonName = trim(fgets(STDIN));
echo $data[$searchPersonName];

function readCLI(array &$data)
{
    while ("End" != $input = trim(fgets(STDIN))) {

        $tokens = explode(' ', $input);

        switch ($tokens[1]) {
            case 'company':
                readCompany($data, $tokens);
                break;
            case 'pokemon':
                readPokemon($data, $tokens);
                break;
            case 'parents':
                readParent($data, $tokens);
                break;
            case 'children':
                readChildren($data, $tokens);
                break;
            case 'car':
                readCar($data, $tokens);
                break;
            default:
                break;
        }
    }
}

function readCompany(array &$data, array $tokens)
{
    $name = $tokens[0];
    $companyName = $tokens[2];
    $department = $tokens[3];
    $salary = floatval($tokens[4]);

    $company = new Company($companyName, $department, $salary);

    if (!array_key_exists($name, $data)) {
        $data[$name] = new Person($name);
    }

    $data[$name]->setCompany($company);
}

function readPokemon(array &$data, $tokens)
{
    $name = $tokens[0];
    $pokemonName = $tokens[2];
    $pokemonsType = $tokens[3];
    $pokemon = new Pokemon($pokemonName, $pokemonsType);

    if (!array_key_exists($name, $data)) {
        $data[$name] = new Person($name);
    }

    $data[$name]->setPokemon($pokemon);
}

function readParent(array &$data, array $tokens)
{
    $name = $tokens[0];
    $parentName = $tokens[2];
    $parentBirthday = $tokens[3];
    $parent = new Parents($parentName, $parentBirthday);

    if (!array_key_exists($name, $data)) {
        $data[$name] = new Person($name);
    }

    $data[$name]->setParent($parent);
}

function readChildren(array &$data, array $tokens)
{
    $name = $tokens[0];
    $childName = $tokens[2];
    $childBithday = $tokens[3];
    $children = new Children($childName, $childBithday);

    if (!array_key_exists($name, $data)) {
        $data[$name] = new Person($name);
    }

    $data[$name]->setChildren($children);
}

function readCar(array &$data, array $tokens)
{
    $name = $tokens[0];
    $carModel = $tokens[2];
    $carSpeed = floatval($tokens[3]);
    $car = new Car($carModel, $carSpeed);

    if (!array_key_exists($name, $data)) {
        $data[$name] = new Person($name);
    }

    $data[$name]->setCar($car);
}