<?php
declare(strict_types=1);

class CallCenter
{
    private $db_inst = false;

    public function connectDB()
    {
        $db = new Database();
        $this->db_inst = $db->connect();
    }

    public function __construct()
    {
        $this->connectDB();
    }

    public function main()
    {
        while ("Bye" != $input_str = trim(fgets(STDIN))) {
            $res = $this->getCountryInfo($input_str);

            $hasDB = false;
            foreach ($res as $value) {
                echo "Country: " . $value["country_name"] . PHP_EOL;
                echo "Capital: " . $value["capital"] . PHP_EOL;
                $hasDB = true;
            }

            if (!$hasDB) {
                echo "Could not read from DB." . PHP_EOL;
            }
        }
    }

    private function getCountryInfo(string $str)
    {
        $result = $this->db_inst->query("
            SELECT `country_name`, `capital` FROM `countries`
                WHERE `country_name` = '$str'
                    OR `country_code` = '$str'
                    OR `iso_code` = '$str'
                LIMIT 0,1");

        if (is_object($result)) {
            return $result;
        } else {
            return false;
        }
    }

    private function getCurrencyAndContinent()
    {
        //TODO
    }

    private function isMountainCountry()
    {
        //TODO
    }

    private function isSpecialEquipment()
    {
        //TODO
    }

    private function addCustomer()
    {
        //TODO INSERT SQL
    }

    private function delCustomer()
    {
        //TODO DELETE SQL
    }
}