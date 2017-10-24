<?php
class Carshop
{
    private $db = false;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function main()
    {
        do{
            $input_str = trim(fgets(STDIN));
            $input_arr = explode(",", $input_str);
            //Sample: Audi, A4, 2004, Ivan, Ivanov, BGN 7000
            if(count($input_arr)  == 6){
                $car = [
                    'make' => $input_arr[0],
                    'model'=> $input_arr[1],
                    'year' => $input_arr[2],
                ];
                $person = [
                    'name' =>  $input_arr[3],
                    'family' => $input_arr[4]
                ];
                $amount = [
                    'amount' => $input_arr[5]
                ];
                $this->setSale($car, $person, $amount);
            }
        }
        while($input_str != "Bye");
    }

    protected function setSale($car, $person, $amount)
    {
        try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `cars`
                (`id`,`make`, `model`, `year`)
              VALUES
                (?, ?, ?, ?)");
            $car_id = "null";
            $stmt->bindParam(1, $car_id);
            $stmt->bindParam(2, $car['make']);
            $stmt->bindParam(3, $car['model']);
            $stmt->bindParam(4, $car['year']);
            $stmt->execute();
            // Insert into customers
            // Todo
            // Insert into sales
            // Todo
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}

