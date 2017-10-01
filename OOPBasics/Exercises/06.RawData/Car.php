<?php
declare(strict_types=1);
/* Problem 06.	*Raw data */
class Car
{
    public $model;
    public $engine;
    public $cargo;
    public $tires;

    public function __construct(string $model, Engine $engine,
                                Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }
}