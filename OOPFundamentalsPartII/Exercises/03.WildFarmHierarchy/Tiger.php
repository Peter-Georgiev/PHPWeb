<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 06.10.2017
 * Time: 18:43 ч.
 */

class Tiger extends Felime
{
    public function makeSound()
    {
        echo "ROAAR!" . PHP_EOL;
    }

    public function eatFood(Food $food, string $alabala)
    {
        $this->makeSound();

    }

}