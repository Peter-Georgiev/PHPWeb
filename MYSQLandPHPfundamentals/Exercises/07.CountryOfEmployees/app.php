<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

countryOfEmploees($db);

/**
 * @param PDO $db
 */
function countryOfEmploees(PDO $db)
{
    $readCLI = trim(fgets(STDIN));
    $tokens = explode(', ', $readCLI);

    try {
        if ($tokens[0] == "Info") {
            printGetInfo($db, $tokens);
            return;
        }

        if (count($tokens) != 7) {
            throw new Exception("Error: Please, check your input syntax.");
        }

        $employee = new Employee(
            $tokens[0], // first name
            $tokens[1], // middle name
            $tokens[2], // last name
            array(), // emails
            array(), // phones
            $tokens[6], // department
            $tokens[3], // position
            $tokens[4], // pasportID
            explode(' ', $tokens[5])[1]
        );

        $isInsert = $employee->insertEmployee($db);
        if  ($isInsert) {
            echo "New employee $tokens[0], $tokens[1] $tokens[2] saved.";
        } else {
            throw new Exception("Error insert employee...");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * @param PDO $db
 * @param Employee $employee
 */
function printGetInfo(PDO $db, array $tokens)
{
    try {

        $employee = new Employee(
            $tokens[1],
            $tokens[2],
            $tokens[2]
        );

        $stmt = $employee->getInfo($db);

        $data = [];
        foreach ($stmt as $item) {
            $data[$item["id"]]["employee"] = array(
                $item["first_name"],
                $item["middle_name"],
                $item["last_name"],
                $item["department"],
                $item["position"],
                $item["country_name"]
            );

            if (!array_key_exists("email", $data[$item["id"]])) {
                $data[$item["id"]]["email"] = [];
            }

            $email = $item["email_type"] . ": " . $item["email"];
            if (!in_array($email, $data[$item["id"]]["email"]) && strlen($email) > 2) {
                $data[$item["id"]]["email"][] = $email;
            }

            if (!array_key_exists("phone", $data[$item["id"]])) {
                $data[$item["id"]]["phone"] = [];
            }

            $phone = $item["phone_type"] . ": " . $item["phone"];
            if (!in_array($phone, $data[$item["id"]]["phone"]) && strlen($phone) > 2) {
                $data[$item["id"]]["phone"][] = $phone;
            }
        }

        foreach ($data as $key => $value) {
            $country_code = $value["employee"][5] != null ? ", from " . $value["employee"][5]: "";

            echo $key . ", " . $value["employee"][0] . ", " . $value["employee"][1] . ", " .
                $value["employee"][2] . ", " . $value["employee"][3] . ", " . $value["employee"][4] .
                $country_code;

            for ($i = 0; $i < count($value["email"]); $i++) {
                echo ", ";
                echo $value["email"][$i];
            }

            for ($i = 0; $i < count($value["phone"]); $i++) {
                echo ", ";
                echo $value["phone"][$i];
            }
            echo PHP_EOL . "- - - - - - - - - -" . PHP_EOL;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
