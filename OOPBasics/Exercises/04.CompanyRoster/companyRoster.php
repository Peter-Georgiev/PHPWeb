<?php
declare(strict_types=1);
/* Problem 04.	Company Roster */
include "Employee.php";

$employees = [];

readCLI($employees);

$averageSort = averageSort($employees);

printResult($employees, key($averageSort));

function printResult(array $employees, string $firstDepartment): void {
    usort($employees, function ($a, $b) {
        return $a->getSalary() < $b->getSalary();
    });

    echo "Highest Average Salary: $firstDepartment\n";
    foreach ($employees as $employee) {
        if ($employee->getDepartment() == $firstDepartment) {
            $salary = number_format($employee->getSalary(), 2, '.', '');
            echo $employee->getName() . ' ' . $salary . ' ' .
                $employee->getEmail() . ' ' . $employee->getAge() . "\n";


        }
    }
}

function averageSort(array $employees): array {

    $departments = [];

    foreach ($employees as $employee) {
        if (array_key_exists($employee->getDepartment(), $departments)) {
            $departments[$employee->getDepartment()]++;
        } else {
            $departments[$employee->getDepartment()] = 1;
        }
    }

    $averageSalaries = [];

    foreach ($departments as $key => $value) {
        $averageSalaries[$key] = 0;
        foreach ($employees as $employee) {
            if ($employee->getDepartment() == $key) {
                $averageSalaries[$key] += $employee->getSalary();
            }
        }
        $averageSalaries[$key] = $averageSalaries[$key] / $value;
    }
    arsort($averageSalaries);
    return $averageSalaries;
}

function readCLI(array &$employees): array {
    $n = intval(trim(fgets(STDIN)));
    for ($i = 0; $i < $n; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));

        if (count($input) == 4) {
            $employees[] = new Employee($input[0], floatval($input[1]), $input[2], $input[3]);
            continue;
        }

        if (count($input) == 5) {
            if (is_numeric($input[4])) {
                $employees[] = new Employee($input[0], floatval($input[1]), $input[2],
                    $input[3], 'n/a', intval($input[4]));
                continue;
            }

            $employees[] = new Employee($input[0], floatval($input[1]), $input[2],
                $input[3], $input[4]);
        }

        if (count($input) == 6) {
            $employees[] = new Employee($input[0], floatval($input[1]), $input[2],
                $input[3], $input[4], intval($input[5]));
        }
    }
    return $employees;
}