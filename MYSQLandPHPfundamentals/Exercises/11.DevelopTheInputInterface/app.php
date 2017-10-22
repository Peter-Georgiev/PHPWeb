<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

//$readCLI = trim(fgets(STDIN));
$readCLI = "Insert, Peter, Georgiev, Georgiev, SysAdmin, Senior SysAdmin, Passport 43IN243876846BGG, USA, emails, personal: ivanov@abv.bg, work: ivanov@bwct.com, work: summer_deals@bwct.com, phones, personal: +7654656465655, work: +7654656656565, work: +7654656656599";

$readCLI = "Update, Peter, Georgiev, Georgiev, Passport 43IN243876846BGG, emails, peter.georgiev@abv.bg, phones, +33598797988
";

if (strtolower(explode(', ', $readCLI)[0]) == "insert") {
    insertEmploees($db, $readCLI);
} elseif (strtolower(explode(', ', $readCLI)[0]) == "update") {
    updateEmployee($db, $readCLI);
} elseif (strtolower(explode(', ', $readCLI)[0]) == "delete") {
    //TODO
}

function updateEmployee(PDO $db, string $readCLI)
{
    $tempArr = explode('emails, ', $readCLI);
    $dataEmails = [];
    $dataPhones = [];
    $emailsAndPhones = [];

    $emailsAndPhones["emails"] = explode('phones, ', $tempArr[1])[0];
    $emailsAndPhones["phones"] = explode('phones, ', $tempArr[1])[1];

    foreach (explode(',', $emailsAndPhones["emails"]) as $value) {
        if (strlen(trim($value)) > 0) {
            $dataEmails[] = trim($value);
        }
        unset($arr);
    }

    foreach (explode(',', $emailsAndPhones["phones"]) as $value) {
        if (strlen(trim($value)) > 0) {
            $dataPhones[] = trim($value);
        }
        unset($arr);
    }
    unset($emailsAndPhones);

    $tokens = [];
    foreach (explode(', ', $tempArr[0]) as $value) {
        if (strlen(trim($value)) > 0) {
            $tokens[] = trim($value);
        }
    }
    unset($tempArr);

    try {

        if (count($tokens) != 8) {
            //throw new Exception("Error: Please, check your input syntax.");
        }

        $employee = new Employee(
            $tokens[1], // first name
            $tokens[2], // middle name
            $tokens[3], // last name
            array(), // KVP emails
            array(), // KVP phones
            "", // country_code
            null, // department
            null, // position
            explode(' ', $tokens[4])[1] //passport ID
        );
        unset($tokens);
        $stmt = $employee->getInfo($db);

        $data = [];
        foreach ($stmt as $item) {
            $data[$item["id"]]["employee"] = array(
                $item["first_name"],
                $item["middle_name"],
                $item["last_name"],
                $item["passportID"]
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
            $passportID = $value["employee"][3] != null ? ", Passport " . $value["employee"][3] : "";

            echo $key . ", " . $value["employee"][0] . ", " . $value["employee"][1] . ", " .
                $value["employee"][2] . $passportID;

            for ($i = 0; $i < count($value["email"]); $i++) {
                echo ", ";
                echo $value["email"][$i];
            }

            for ($i = 0; $i < count($value["phone"]); $i++) {
                echo ", ";
                echo $value["phone"][$i];
            }
            echo PHP_EOL . "- - - - - - - - - -" . PHP_EOL;
            echo "Which e-mail and telephone number must be updated?" . PHP_EOL;
        }

        echo "Enter type e-mail: ";
        $emailType = trim(fgets(STDIN));
        echo "Enter old e-mail: ";
        $oldEmail = trim(fgets(STDIN));
        echo "Enter type phone: ";
        $phoneType = trim(fgets(STDIN));
        echo "Enter old phone: ";
        $oldPhone = trim(fgets(STDIN));

        $employee->updateEmail($db, $emailType, $oldEmail, $dataEmails[0]);
        $employee->updatePhone($db, $phoneType, $oldPhone, $dataPhones[0]);
        echo "UPDATE YES";

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function insertEmploees(PDO $db, string $readCLI)
{
    $tempArr = explode('emails, ', $readCLI);
    $dataEmails = [];
    $dataPhones = [];
    $emailsAndPhones = [];

    $emailsAndPhones["emails"] = explode('phones, ', $tempArr[1])[0];
    $emailsAndPhones["phones"] = explode('phones, ', $tempArr[1])[1];

    foreach (explode(',', $emailsAndPhones["emails"]) as $value) {
        if (strlen(trim($value)) > 0) {
            $arr = explode(': ', trim($value));
            $dataEmails[$arr[0]][] = trim($arr[1]);
        }
        unset($arr);
    }

    foreach (explode(',', $emailsAndPhones["phones"]) as $value) {
        if (strlen(trim($value)) > 0) {
            $arr = explode(': ', trim($value));
            $dataPhones[$arr[0]][] = trim($arr[1]);
        }
        unset($arr);
    }
    unset($emailsAndPhones);

    $tokens = [];
    foreach (explode(', ', $tempArr[0]) as $value) {
        if (strlen(trim($value)) > 0) {
            $tokens[] = trim($value);
        }
    }
    unset($tempArr);

    try {

        if (count($tokens) != 8) {
            throw new Exception("Error: Please, check your input syntax.");
        }

        $employee = new Employee(
            $tokens[1], // first name
            $tokens[2], // middle name
            $tokens[3], // last name
            $dataEmails, // KVP emails
            $dataPhones, // KVP phones
            $tokens[7], // country_code
            $tokens[4], // department
            $tokens[5], // position
            explode(' ', $tokens[6])[1] //passport ID
        );

        $hasemployee = $employee->insertEmployee($db);
        $hasEmail = $employee->insertEmail($db);
        $hasPhone = $employee->insertPhone($db);

        if ($hasemployee) {
            echo "New employee $tokens[0], $tokens[1] $tokens[2] saved." . PHP_EOL;
        } else {
            throw new Exception("Error insert employee...");
        }

        if ($hasEmail) {
            echo "Email Insert" . PHP_EOL;
        } else {
            throw new Exception("Error insert email...");
        }
        if ($hasPhone) {
            echo "Phone Insert" . PHP_EOL;
        } else {
            throw new Exception("Error insert phone...");
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}