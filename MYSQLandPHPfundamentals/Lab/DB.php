<?php
declare(strict_types=1);

class DB
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function Query()
    {
        echo "query database";
    }
}

$db = DB::getInstance();

$db->Query();