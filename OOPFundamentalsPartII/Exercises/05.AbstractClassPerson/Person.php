<?php
declare(strict_types=1);

abstract class Person
{
    private $name;
    private $yearBirth;
    private $yearDead;

    public function __construct(string $name, int $yearBirth, int $yearDeath){
        $this->setName($name);
        $this->setYearBirth($yearBirth);
        $this->setYearDead($yearDeath);
    }

    private function setName($name)
    {
        if(mb_strlen($name) < 3){
            throw new Exception("ERROR! - name length");
        }
        $this->name = $name;
    }

    protected function setYearBirth (int $yearBirth)
    {
        $this->yearBirth = $yearBirth;
    }

    public function setYearDead (int $yearDead)
    {
        $this->yearDead = $yearDead;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getYearBirth()
    {
        return $this->yearBirth;
    }

    public function getYearDead()
    {
        return $this->yearDead;
    }

    public function getTimeLived ()
    {
        return $this->yearDead - $this->yearBirth;
    }
}