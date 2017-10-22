<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

insertEmail($db);

function insertEmail($db)
{
    try {
        $readCLI = trim(fgets(STDIN));

        $tokens = explode('emails, ', $readCLI);
        $nameTokens = explode(', ', $tokens[0]);

        $tempEmailTokens = explode(', ', $tokens[1]);
        $emailTokens = [];

        foreach ($tempEmailTokens as $item) {
            $tempKVP = explode(': ', $item);
            if (count($tempKVP) % 2 != 0) {
                throw new Exception("Error: Please, check your input email syntax.");
            }

            if (strlen($item) == 0) {
                continue;
            }

            if (!array_key_exists($tempKVP[0], $emailTokens)) {
                $emailTokens[$tempKVP[0]][] = $tempKVP[1];
                continue;
            }
            $emailTokens[$tempKVP[0]][] = $tempKVP[1];
        }

        if (is_numeric($nameTokens[0])) {
            insertEmailOptionID($db, $nameTokens, $emailTokens);
        } else {
            insertEmailOptionTwo($db, $nameTokens, $emailTokens);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function insertEmailOptionID(PDO $db, array $nameTokens, array $emailTokens)
{
    $employee = new Employee(
        $nameTokens[1],
        $nameTokens[2],
        $nameTokens[3],
        $emailTokens
    );

    $isExist = $employee->exists($db, intval($nameTokens[0]));
    if (!$isExist) {
        throw new Exception("The employees does not exist");
    }

    $isEmailSaved = $employee->insertEmail($db, intval($nameTokens[0]));
    if (!$isEmailSaved) {
        throw new Exception("ERROR in function insertEmail");
    }

    echo 'Emails of ' . $nameTokens[1] . ' ' .
        $nameTokens[2] . ' ' . $nameTokens[3] . ' saved';
}

function insertEmailOptionTwo(PDO $db, array $nameTokens, array $emailTokens)
{
    $employee = new Employee(
        $nameTokens[0],
        $nameTokens[1],
        $nameTokens[2],
        $emailTokens
    );

    $arr = $employee->checkAndGetPersonNameUnique($db);

    if (count($arr) > 0) {
        throw new Exception("Employees with this name: " . implode(', ', $arr));
    }

    $isNameSaved = $employee->insertNames($db);
    if (!$isNameSaved) {
        throw new Exception("ERROR in function insertNames");
    }

    $isEmailSaved = $employee->insertEmail($db);
    if (!$isEmailSaved) {
        throw new Exception("ERROR in function insertEmail");
    }

    echo 'Emails of ' . $nameTokens[0] . ' ' .
        $nameTokens[1] . ' ' . $nameTokens[2] . ' saved';
}