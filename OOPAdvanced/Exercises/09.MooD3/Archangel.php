<?php
declare(strict_types=1);

class Archangel extends GameObjects implements IInfoGames
{
    protected function setUsername(string $username)
    {
        if (strlen($username) > 10) {
            throw new  Exception("Error lenght $username");
        }
        $this->username = $username;
    }

    public function username()
    {
        return "\"" . $this->getUsername() . "\"";
    }

    public function hashedPassword()
    {
        $nameRev = strrev($this->getUsername());
        return "\"" . $nameRev . strlen($this->getUsername()) * 21 . "\"";
    }

    public function type(): string
    {
        return $this->getType();
    }

    public function specialPoints()
    {
        return round($this->getPoints() * $this->getLevel());
    }
}