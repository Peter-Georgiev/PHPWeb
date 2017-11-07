<?php
declare(strict_types=1);

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /** @var \PDOStatement  */
    private $pdoStatemet;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatemet = $pdoStatement;

    }

    /**
     * @param null|string $className
     * @return \Generator
     */
    public function fetchAll(?string $className = null): \Generator
    {
        while ($row = $this->pdoStatemet->fetchObject($className)) {
            yield $row;
        }
    }
}