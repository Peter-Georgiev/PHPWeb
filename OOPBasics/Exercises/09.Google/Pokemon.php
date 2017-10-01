<?php
declare(strict_types=1);

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