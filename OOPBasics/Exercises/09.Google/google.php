<?php
declare(strict_types=1);

include "Person.php";
include "Company.php";
include "Pokemon.php";
include "Parents.php";
include "Children.php";
include "Car.php";

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