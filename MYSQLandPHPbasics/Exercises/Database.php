<?php

class Database extends PDO
{
    private $db_host = "localhost";
    private $db_name = "geography";
    private $db_username = "root";
    private $db_password = "peroxmen";

    /**
     * Database constructor.
     */
    public function __construct()
    {
        parent::__construct("mysql:dbname=$this->db_name;host=$this->db_host;charset=utf8", $this->db_username, $this->db_password);
    }

    public function setErrorException()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function connect()
    {
        $this->setErrorException();
        return $this;
    }
}