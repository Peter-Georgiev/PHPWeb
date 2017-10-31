<?php

abstract class Controller
{
    /**
     * @var null|PDO
     */
    protected $db = null;

    /**
     * Controller constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    abstract public function main();

    public function loadView($filename)
    {
        if (file_exists($filename)) {

        }
    }

}