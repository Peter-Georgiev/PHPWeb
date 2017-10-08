<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 06.10.2017
 * Time: 18:39 ч.
 */

class Mammal extends Animal
{
    private $livingRegion;

    public function __construct(string $animalName, string $animalType,
                                float $animalWeight, string $livingRegion)
    {
        $this->setName($animalName);
        $this->setType($animalType);
        $this->setWeight();

    }

}