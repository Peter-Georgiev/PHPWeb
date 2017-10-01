<?php
declare(strict_types=1);
include "Pokemon.php";
include "Trainer.php";

$trainersAndPokemons = [];
$namesOfTrainers = [];

while (true) {
    $input = trim(fgets(STDIN));
    if ($input == "Tournament") {
        break;
    }

    $trainerInfo = explode(' ', $input);
    $trainerName = $trainerInfo[0];
    $pokemonName = $trainerInfo[1];
    $pokemonElement = $trainerInfo[2];
    $pokemonHealth = intval($trainerInfo[3]);

    if (!in_array($trainerName, $namesOfTrainers)) {
        $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
        $trainer = new Trainer($trainerName);
        $trainer->Pokemons($pokemon);
        $trainersAndPokemons[] = $trainer;
        $namesOfTrainers[] = $trainerName;
    } else {
        $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);

        foreach ($trainersAndPokemons as $trainerAndPokemon) {
            if ($trainerAndPokemon->getName() == $trainerName) {
                $trainerAndPokemon->Pokemons($pokemon);
            }
        }
    }
}

while (true) {
    $input = trim(fgets(STDIN));

    if ($input == "End") {
        break;
    }

    foreach ($trainersAndPokemons as $trainerAndPokemon) {
        $pokemonsByTrainer = $trainerAndPokemon->getPokemons();
        foreach ($pokemonsByTrainer as $key => $pokemon) {
            if ($pokemon->getElement() == $input) {
                $trainerAndPokemon->addBadge();
                break;
            } else {
                $pokemon->reduceHealth();
                if ($pokemon->getHealth() <= 0) {
                    array_splice($pokemonsByTrainer, $key, 1);
                }
            }
        }
        $trainerAndPokemon->addPocemonCollection($pokemonsByTrainer);
    }
}

usort($trainersAndPokemons, 'orderByNumberOfBadges');
foreach ($trainersAndPokemons as $trainerAndPokemons) {
    echo $trainerAndPokemons->getName() . ' ' .
        $trainerAndPokemons->getNumberOfBadges() . ' ' .
        $trainerAndPokemons->countOfPokemons() . PHP_EOL;
}

function orderByNumberOfBadges($a, $b)
{
    return $a->getNumberOfBadges() < $b->getNumberOfBadges();
}