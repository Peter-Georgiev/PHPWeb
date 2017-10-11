<?php
declare(strict_types=1);

interface IInfoGames
{
    public function username();

    public function hashedPassword();

    public function type();

    public function specialPoints();
}

abstract class GameObjects
{
    protected $username;
    private $type;
    private $level;
    private $points;

    public function __construct(string $username, string $type, float $level, int $points)
    {
        $this->setUsername($username);
        $this->type = $type;
        $this->level = $level;
        $this->points = $points;
    }

    protected function setUsername(string $username)
    {
        $this->username = $username;
    }

    protected function getUsername()
    {
        return $this->username;
    }

    protected function getType(): string
    {
        return $this->type;
    }

    protected function getLevel(): float
    {
        return $this->level;
    }


    protected function getPoints(): int
    {
        return $this->points;
    }
}

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

$tokens = explode("|", trim(fgets(STDIN)));

$type = trim($tokens[1]);
$data = null;

switch ($type) {
    case "Demon":
        $data = new Demon(trim($tokens[0]), $type, floatval($tokens[2]), intval($tokens[3]));
        break;
    case "Archangel":
        $data = new Archangel(trim($tokens[0]), $type, floatval($tokens[2]), intval($tokens[3]));
        break;
}

echo $data->username() . " | " . $data->hashedPassword() . " -> " . $data->type() . PHP_EOL;
echo $data->specialPoints();