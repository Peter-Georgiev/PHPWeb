<?php
declare(strict_types=1);

class Demon extends GameObjects implements IInfoGames
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
        return "\"" . strlen($this->getUsername()) * 217 . "\"";
    }

    public function type(): string
    {
        return $this->getType();
    }

    public function specialPoints()
    {
        return number_format($this->getPoints() * $this->getLevel(), 1, '.', '');
    }
}