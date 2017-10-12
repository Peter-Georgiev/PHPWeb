<?php
declare(strict_types=1);

class LeutenantGeneral extends PrivateSoldier
{
    private $privateSoldier = [];

    public function __construct($firstName, $lastName, $id, $salary, $priv)
    {
        parent::__construct($firstName, $lastName, $id, $salary);
        $this->setPrivateSoldier($priv);
    }

    private function setPrivateSoldier($priv)
    {
        foreach ($priv as $soldier) {
            $this->privateSoldier[] = $soldier;
        }
    }

    private function getPrivateSolider()
    {
        $arr = array_reverse($this->privateSoldier);
        $partString = null;
        foreach ($arr as $soldier) {
            $partString .= ' ' . $soldier;
        }
        return $partString;
    }

    public function __toString()
    {
        return parent::__toString() . 'Privates:' . PHP_EOL . $this->getPrivateSolider();
    }
}