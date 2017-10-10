<?php
declare(strict_types=1);

class LeutenantGeneral extends PrivateSoldier
{
    private $privateSoldier = [];

    public function __toString()
    {
        $private_str = "Private:".PHP_EOL;
        //todo
        return "Name: " . parent::__toString();

        //TODO


    }
}