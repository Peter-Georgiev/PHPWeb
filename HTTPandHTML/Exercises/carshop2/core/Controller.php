<?php

abstract class Controller
{
    /**
     * @var null|PDO
     */
    protected $db = null;
    protected $input = null;

    /**
     * Controller constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        if (isset($_GET['input'])) {
            $this->input = $_GET['input'];
        } elseif (isset($_GET['addSale'])) {
            $this->input = "addSale";
        } elseif (isset($_GET["customers"])) {
            $this->input = "customers";
        } elseif (isset($_GET["cars"])) {
            $this->input = "cars";
        } elseif (isset($_GET["search"])) {
            $this->input = "search";
        } elseif (isset($_GET["update_type"])) {
            $this->input = "update_type";
        }elseif (isset($_GET["update"])) {
            $this->input = "update";
        }
        $this->db = $db;
    }

    abstract public function main();
}