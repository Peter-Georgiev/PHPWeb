<?php
declare(strict_types=1);

namespace Database;


interface StatementInterface
{
    public function execute(array $params = []):ResultSetInterface;

}