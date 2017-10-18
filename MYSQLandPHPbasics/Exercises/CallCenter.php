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
        echo "Problem 7. Call Center Application - Enter number: 7" .PHP_EOL;
        echo "Problem 7.1. Add Currency and Continent - Enter number: 7.1" . PHP_EOL;
        echo "Problem 7.2. Customers in the Mountain - Enter number: 7.2" . PHP_EOL;
        echo "Problem 7.3. Special Ski Equipment - Enter number: 7.3" . PHP_EOL;
        echo "Problem 9. Add Customer Functionality - Enter number: 9" . PHP_EOL;
        echo "Problem 10. Delete Customer Functionality - Enter number: 10" . PHP_EOL;

        echo "Enter number from problem: ";
        $n = floatval(fgets(STDIN));
        echo PHP_EOL;
        if ($n == 7) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getCallCenterApplication($input_str);
            }
        } elseif ($n == 7.1) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getAddCurrencyAndContinent($input_str);
            }
        } elseif ($n == 7.2) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getCustomersInTheMountain($input_str);
            }
        } elseif ($n == 7.3) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->getSpecialSkiEquipment($input_str);
            }
        } elseif ($n == 9) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $iso = $this->addCustomer($input_str);
                $this->getAddCurrencyAndContinent($iso);
                $this->getCustomerISO($iso);
            }
        } elseif ($n == 10) {
            while ("Bye" != $input_str = trim(fgets(STDIN))) {
                $this->delCustomer($input_str);
            }
        }
    }

    private function getCountryInfo(string $str)
    {
        $stmt = $this->db_inst->query("
            SELECT `country_name`, `capital` FROM `countries`
                WHERE `country_name` = '$str'
                    OR `country_code` = '$str'
                    OR `iso_code` = '$str'
                LIMIT 0,1");
        return $stmt;
    }

    private function getCurrencyAndContinent(string $str)
    {
        $stmt = $this->db_inst->query("
            SELECT cy.country_name, cy.capital, cr.description, ct.continent_name, cy.country_code
                FROM `countries` AS cy
                    JOIN  `continents` AS ct
                      ON cy.continent_code = ct.continent_code
                    JOIN `currencies` AS cr
                      ON cy.currency_code = cr.currency_code
                    WHERE cy.country_code = '$str'
                      OR	cy.iso_code = '$str'");
        return $stmt;
    }

    private function isMountainCountry(string $str): bool
    {
        $stmt = $this->db_inst->query("
            SELECT m.mountain_range
                FROM `mountains` AS m
                  JOIN `mountains_countries` AS mc
                    ON m.id = mc.mountain_id
                  WHERE mc.country_code = '$str'");

        $hasStmt = false;
        foreach ($stmt as $value) {
            $value;
            $hasStmt = true;
        }

        if ($hasStmt) {
            return true;
        }
        return false;
    }

    private function isSpecialEquipment(string $str): bool
    {
        $stmt = $this->db_inst->query("
            SELECT m.mountain_range, p.peak_name, p.elevation
                FROM `mountains` AS m
                    JOIN `mountains_countries` AS mc
                      ON m.id = mc.mountain_id
                    JOIN `peaks` AS p
                        ON m.id = p.mountain_id
                    WHERE mc.country_code = '$str'
                        ANd p.elevation > 4000");

        $hasStmt = false;
        foreach ($stmt as $value) {
            $value;
            $hasStmt = true;
        }

        if ($hasStmt) {
            return true;
        }
        return false;
    }

    private function getCountryISO(string $str)
    {
        $stmt = $this->db_inst->query("
            SELECT country_code
                FROM `countries`
                  WHERE country_code = '$str'
                    OR iso_code = '$str'
                    OR country_name = '$str'");
        return $stmt;
    }

    private function getCustomerISO(string $str)
    {
        $stmt = $this->db_inst->query("
            SELECT customer_name, customer_family
                FROM `customer`
                  WHERE country_code = '$str'");
        $hasDB = false;
        foreach ($stmt as $value) {
            echo "Name: " . $value["customer_name"] . PHP_EOL;
            echo "Garabe: " . $value["customer_family"] . PHP_EOL;
            $hasDB = true;
        }

        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }

    private function addCustomer(string $str): string
    {
        $tokens = explode(',', $str);
        $tokensISO = explode(' ', $tokens[0]);
        if (count($tokens) != 3 && count($tokensISO) != 2) {
            exit("Input ERROR");
        }
        $fName = trim($tokens[1]);
        $lName = trim($tokens[2]);

        $iso = "";
        $stmt = $this->getCountryISO(trim($tokensISO[1]));
        foreach ($stmt as $value) {
            ($iso = $value["country_code"]);
            break;
        }

        if (strlen($iso) == 0) {
            exit("Exception: Country doesn't exist.");
        }

        $stmt = null;
        $stmt = $this->db_inst->prepare("
            INSERT INTO `customer` (customer_name, customer_family, country_code) 
                VALUE (?, ?, ?)");

        $customer_name = $fName;
        $customer_family = $lName;
        $country_code = $iso;

        $stmt->bindParam(1, $customer_name);
        $stmt->bindParam(2, $customer_family);
        $stmt->bindParam(3, $country_code);

        $stmt->execute();
        return $iso;
    }

    private function delCustomer(string $str)
    {
        $tokens = explode(',', $str);
        if (count($tokens) != 3) {
            exit("Input ERROR");
        }
        $fName = trim($tokens[1]);
        $lName = trim($tokens[2]);

        $stmt = $this->db_inst->prepare("
            DELETE FROM `customer` 
              WHERE customer_name = ? 
                AND customer_family = ?");

        $customer_name = $fName;
        $customer_family = $lName;

        $stmt->bindParam(1, $customer_name);
        $stmt->bindParam(2, $customer_family);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Customer $fName $lName removed" . PHP_EOL;
        } else {
            echo "Customer don't is remove" . PHP_EOL;
        }
    }

    private function getCallCenterApplication(string $input_str)
    {
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

    private function getAddCurrencyAndContinent(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);

        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL;
            $hasDB = true;
        }

        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }

    private function getCustomersInTheMountain(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);

        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL;

            if ($this->isMountainCountry($value["country_code"])) {
                echo "Forward customer for special offers!" . PHP_EOL;
            }
            $hasDB = true;
        }

        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }

    private function getSpecialSkiEquipment(string $input_str)
    {
        $res = $this->getCurrencyAndContinent($input_str);

        $hasDB = false;
        foreach ($res as $value) {
            echo "Country: " . $value["country_name"] . PHP_EOL;
            echo "Capital: " . $value["capital"] . PHP_EOL;
            echo "Currency: " . $value["description"] . PHP_EOL;
            echo "Continent: " . $value["continent_name"] . PHP_EOL;

            if ($this->isMountainCountry($value["country_code"])) {
                echo "Forward customer for special offers! " . PHP_EOL;
            }

            if ($this->isSpecialEquipment($value["country_code"])) {
                echo "Show high mountain special equipment offers!" . PHP_EOL;
            }
            $hasDB = true;
        }

        if (!$hasDB) {
            echo "Could not read from DB." . PHP_EOL;
        }
    }
}