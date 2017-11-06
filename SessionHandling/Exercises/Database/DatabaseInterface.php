<?php
declare(strict_types=1);

namespace Database;


interface DatabaseInterface
{
    public function query(string $query): StatementInterface;

    //public function getLasstError();
    public function getLasstError(): array;

    public function getLastId();
}