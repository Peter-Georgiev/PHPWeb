<?php
declare(strict_types=1);

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

    public function loadView(string $filename)
    {
        if (file_exists("view/" . $filename)) {
            //include "view/.$filename";
        }
    }

}