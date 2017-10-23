<?php
declare(strict_types=1);

namespace Adapter;

use PDO;

class PDODatabase
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * PDODatabase constructor.
     * @param string $host
     * @param string $dbName
     * @param string $user
     * @param string $pass
     */
    public function __construct(string $host, string $dbName, string $user, string $pass)
    {
        $dns = "mysql:host=" . $host . ";dbname=" . $dbName . ";carset=utf8";
        $this->pdo = new PDO($dns, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $sql
     * @return \PDOStatement
     */
    public function prepare(string $sql)
    {
        return $this->pdo->prepare($sql);
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    /**
     * @return bool
     */
    public function beginTransaction()
    {
        return $this->pdo->beginTransaction();
    }

    /**
     * @return bool
     */
    public function commit()
    {
        return $this->pdo->commit();
    }

    /**
     * @return array
     */
    public function errorInfo()
    {
        return $this->pdo->errorInfo();
    }
}