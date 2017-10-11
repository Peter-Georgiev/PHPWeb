<?php
declare(strict_types=1);

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

    /**
     * @return mixed
     */
    protected function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    protected function getType(): string
    {
        return $this->type;
    }

    /**
     * @return float
     */
    protected function getLevel(): float
    {
        return $this->level;
    }

    /**
     * @return int
     */
    protected function getPoints(): int
    {
        return $this->points;
    }
}