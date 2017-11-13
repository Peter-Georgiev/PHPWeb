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

<<<<<<< HEAD
=======
    /**
     * @param null|string $className
     * @return \Generator
     */
>>>>>>> origin/master
    public function fetchAll(?string $className = null): \Generator
    {
        while ($row = $this->pdoStatemet->fetchObject($className)) {
            yield $row;
        }
    }
<<<<<<< HEAD
=======

    public function fetch($className): \Generator
    {
        // TODO: Implement fetch() method.
    }

    public function rowCount(): int
    {
        $this->pdoStatemet->rowCount();
    }
>>>>>>> origin/master
}