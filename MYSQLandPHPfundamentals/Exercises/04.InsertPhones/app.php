<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

insertPhone($db);

function insertPhone($db)
{
    try {
        $readCLI = trim(fgets(STDIN));

        $tokens = explode('phones, ', $readCLI);
        $nameTokens = explode(', ', $tokens[0]);

        $tempPhoneTokens = explode(', ', $tokens[1]);
        $phoneTokens = [];

        foreach ($tempPhoneTokens as $item) {
            $tempKVP = explode(': ', $item);
            if (count($tempKVP) % 2 != 0) {
                throw new Exception("Error: Please, check your input phone number syntax.");
            }

            if (strlen($item) == 0) {
                continue;
            }

            if (!array_key_exists($tempKVP[0], $phoneTokens)) {
                $phoneTokens[$tempKVP[0]][] = $tempKVP[1];
                continue;
            }
            $phoneTokens[$tempKVP[0]][] = $tempKVP[1];
        }

        insertPhoneOption($db, $nameTokens, $phoneTokens);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function insertPhoneOption(PDO $db, array $nameTokens, array $phoneTokens)
{
    $employee = new Employee(
        $nameTokens[0],
        $nameTokens[1],
        $nameTokens[2],
        array(),
        $phoneTokens
    );

    $arr = $employee->checkAndGetPersonNameUnique($db);

    if (count($arr) == 0) {
        throw new Exception("The employees does not exist");
    }

    for ($i = 0; $i < count($arr); $i++) {
        $isPhoneSaved = $employee->insertPhone($db, intval($arr[$i]));
        if (!$isPhoneSaved) {
            throw new Exception("ERROR in function insertPhone");
        }
    }

    echo "Employees with this name: ";
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i];
        if ($i < count($arr) - 1) {
            echo ", ";
        } else {
            echo PHP_EOL;
        }
    }

    echo 'Phones of ' . $nameTokens[0] . ' ' .
        $nameTokens[1] . ' ' . $nameTokens[2] . ' saved';
}