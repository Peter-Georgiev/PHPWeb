<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 06.10.2017
 * Time: 18:42 ч.
 */

class Cat extends Felime
{
    private $breed;

    public function __construct (string $animalType, string $animalName,
                                 float $animalWeight, string  $animalLivingRegion,
                                 string $breed)
    {
        $this->setBreed($breed);
    }

    private function setBreed($breed)
    {
        $this->breed = $breed;
    }

    public function makeSound()
    {
        echo "Mowwwww";
    }
}