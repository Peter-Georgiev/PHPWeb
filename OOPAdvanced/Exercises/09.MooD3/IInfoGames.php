<?php
declare(strict_types=1);

interface IInfoGames
{
    public function username();

    public function hashedPassword();

    public function type();

    public function specialPoints();
}