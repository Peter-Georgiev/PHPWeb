<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$db = null;
try {
    $db = new PDO ("mysql:host=localhost;dbname=php-course;charset=utf8", "root", "***");
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}

$n = intval(fgets(STDIN));
while ($n--) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    if (count($tokens) == 4) {
        $employee = new Employee($tokens[0], $tokens[1], intval($tokens[2]), $tokens[3]);
        dbInsert($employee, $db);
        echo $db->lastInsertId();
    } elseif (count($tokens) == 3) {
        $employee = new Employee($tokens[0], $tokens[1], intval($tokens[2]));
        dbInsert($employee, $db);
        echo $db->lastInsertId();
    } else {
        exit("input error");
    }
}

function dbInsert(Employee $employee, PDO $db){
    $stmt = $db->prepare("INSERT INTO `students` (first_name, last_name, student_number, phone) 
                VALUE (?, ?, ?, ?)");

    $fName = $employee->getFirstName();
    $lName = $employee->getLastName();
    $stdNum = $employee->getStudenNumber();
    $phone = $employee->getPhone();

    $stmt->bindParam(1, $fName);
    $stmt->bindParam(2, $lName);
    $stmt->bindParam(3, $stdNum);
    $stmt->bindParam(4, $phone);

    $stmt->execute();
}