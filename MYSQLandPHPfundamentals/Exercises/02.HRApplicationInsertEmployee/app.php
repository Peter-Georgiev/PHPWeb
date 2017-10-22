<?php
declare(strict_types=1);
include "db_config.php";
include "Employee.php";

hrApplicationInsertEmployee($db);

function hrApplicationInsertEmployee($db)
{
    $readCLI = trim(fgets(STDIN));

    $tokens = explode(', ', $readCLI);

    try {
        if (count($tokens) != 6) {
            throw new Exception("Error: Please, check your input syntax.");
        }

        $employee = new Employee(
            $tokens[0],
            $tokens[1],
            $tokens[2],
            $tokens[3],
            $tokens[4],
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
