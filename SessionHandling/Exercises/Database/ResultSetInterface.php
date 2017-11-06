<?php
declare(strict_types=1);

namespace Database;


interface ResultSetInterface
{
    public function fetchAll(?string $className = null): \Generator;
}