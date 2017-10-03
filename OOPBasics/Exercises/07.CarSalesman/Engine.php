<?php
declare(strict_types=1);

class Engine
{
    private $model;
    private $power;
    private $displacment; //optional
    private $efficiency; //optional

    public function __construct(string $model, string $power,
                                string $displacement = "n/a",
                                string $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacment = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getPower(): string
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getDisplacment(): string
    {
        return $this->displacment;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    public function __toString()
    {
        return $this->getModel();
    }
}