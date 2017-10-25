<?php
declare(strict_types=1);

class Carshop
{
    private $db = false;

    /**
     * Carshop constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function main($isTriggerSales = false)
    {
        if ($isTriggerSales){
            $this->setSaleCreateTriggerForSales();
        }

        do {
            $input_str = trim(fgets(STDIN));
            //$input_str = "Audi, A4, 2004, Ivan, Ivanov, BGN 7000";
            $input_arr = explode(",", $input_str);
            //Sample: Audi, A4, 2004, Ivan, Ivanov, BGN 7000

            if (count($input_arr) == 6) {
                $car = [
                    'make' => trim($input_arr[0]),
                    'model' => trim($input_arr[1]),
                    'year' => intval($input_arr[2]),
                ];
                $person = [
                    'name' => trim($input_arr[3]),
                    'family' => trim($input_arr[4])
                ];
                if (count(explode(' ', trim($input_arr[5]))) != 2) {
                    exit("INPIT ERROR");
                }
                $amount = [
                    'amount' => intval(explode(' ', trim($input_arr[5]))[1])
                ];

                $lastID = $this->setSale($car, $person, $amount);

                foreach ($this->getSale($lastID)->fetch(PDO::FETCH_ASSOC) as $value) {
                    echo "New sale entered " . $value . PHP_EOL;
                }
            }

        } while ($input_str != "Bye");

        if ($isTriggerSales){
            $this->getSaleCreateTriggerForSales();
        }
    }

    /**
     * @param $car
     * @param $person
     * @param $amount
     * @return int
     */
    protected function setSale($car, $person, $amount): int //Problem 2. Add a Car and a Customer
    {
        try {
            // Insert into car
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("
              INSERT INTO `cars` (`make`, `model`, `year`)
              VALUES (?, ?, ?);");
            $stmt->bindParam(1, $car['make']);
            $stmt->bindParam(2, $car['model']);
            $stmt->bindParam(3, $car['year']);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();

            // Insert into customers
            $stmt = $this->db->prepare("
              INSERT INTO `customers` (`first_name`, `last_name`)
              VALUES (?, ?);");
            $customer_id = null;
            $stmt->bindParam(1, $person["name"]);
            $stmt->bindParam(2, $person["family"]);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();

            // Insert into sales
            $stmt = $this->db->prepare("
              INSERT INTO `sales` (`customer_id`, `car_id`, `amount`)
              VALUES (?, ?, ?);");
            $stmt->bindParam(1, $customer_id);
            $stmt->bindParam(2, $car_id);
            $stmt->bindParam(3, $amount["amount"]);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $stmt->execute();

            $this->db->commit();

            return intval($sale_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    protected function getSale(int $id)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT s.date_time_sale
                FROM sales AS s 
                INNER JOIN customers AS cs
                  USING (customer_id)
                INNER JOIN cars AS cr
                  ON s.car_id = cr.id
                WHERE s.sale_id =  ?");
            $stmt->bindParam(1, $id);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function getAllSales() //Problem 3. Get All Sales
    {
        try {
            $stmt = $this->db->prepare("
               SELECT cr.make, cr.model, s.date_time_sale, s.amount
                FROM sales AS s 
                JOIN customers
                  USING(customer_id)
                JOIN cars AS cr
                  ON s.car_id = cr.id
                GROUP BY s.date_time_sale");
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function getTotalSales()
    {
        try {
            $stmt = $this->db->prepare("
               SELECT SUM(s.amount) AS total
                FROM sales AS s 
                JOIN customers
                  USING(customer_id)
                JOIN cars AS cr
                  ON s.car_id = cr.id");
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function getSalesUseMySQLProcedure() //Problem 4. Use MySQL Procedure
    {
        try {
            $stmt = $this->db->query('CALL get_sales', PDO::FETCH_ASSOC);
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }


    public function getSalesUseMySQLFunction() //Problem 5. Use MySQL Function
    {
        try {
            $stmt = $this->db->prepare("
                SELECT get_full_name(first_name, last_name) AS full_name
                FROM customers");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function getViewParticularDeal() // Problem 6. View a Particular Deal, Problem 7. Extend getSales()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT *
                FROM `deal`");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    private function setSaleCreateTriggerForSales() //Problem 8. Create a Trigger for Sales
    {
        try {
            $stmt = $this->db->prepare("SET @sum = 0;");
            $stmt->execute();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    private function getSaleCreateTriggerForSales() //Problem 8. Create a Trigger for Sales
    {
        try {
            $stmt = $this->db->prepare("SELECT @sum AS 'Total sales'");
            $stmt->execute();

            foreach ($stmt->fetch(PDO::FETCH_ASSOC) as $value) {
                echo "---" . PHP_EOL . "Total sales:" . $value;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // Problem 9. Get Sales for Particular Period
    // Problem 10. Rewrite get_sales MySQL Procedure
    public function getGetSalesForParticularPeriod(string $date_start, string $date_end)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT *
                FROM deal
                WHERE deal.date_time_sale
                BETWEEN 
                CONCAT('$date_start', '-01') 
                AND
                CONCAT('$date_end', '-01')");
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}


