<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

getEmailsOfEmployee($db);

function getEmailsOfEmployee($db)
{
    try {
        $readCLI = trim(fgets(STDIN));

        $tokens = explode(', ', $readCLI);

        if ($tokens[0] != "Info") {
            throw new Exception("Error: Please, check your input command syntax.");
        }

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
                $item["position"]
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
            echo $key . ", " . $value["employee"][0] . ", " . $value["employee"][1] . ", " .
                $value["employee"][2] . ", " . $value["employee"][3] . ", " . $value["employee"][4];

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

