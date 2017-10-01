<?php
declare(strict_types=1);

class Trainer
{
    private $name;
    private $numberOfBadges;
    private $pokemons = [];

    public function __construct(string $name, int $numberOfBadges = 0)
    {
        $this->name = $name;
        $this->numberOfBadges = $numberOfBadges;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setNumberOfBadges(int $numberOfBadges)
    {
        $this->numberOfBadges = $numberOfBadges;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumberOfBadges(): int
    {
        return $this->numberOfBadges;
    }

    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function Pokemons(Pokemon $pokemon)
    {
        $this->pokemons [] = $pokemon;
    }

    public function addBadge()
    {
        return $this->numberOfBadges++;
    }

    public function countOfPokemons()
    {
        return count($this->pokemons);
    }

    public function addPocemonCollection($collection)
    {
        $this->pokemons = $collection;
    }
}