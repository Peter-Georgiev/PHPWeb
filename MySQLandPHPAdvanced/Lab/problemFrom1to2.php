<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

$db = new \Adapter\PDODatabase(
    \Config\DBConfig::DB_HOST,
    \Config\DBConfig::DB_NAME,
    \Config\DBConfig::DB_USER,
    \Config\DBConfig::DB_PASSWORD
);

while ("end" != $readCLI = trim(fgets(STDIN))) {

    $tokens = [];

    try {
        foreach (explode(' ', $readCLI) as $item) {
            $item = trim($item);
            if (strlen($item) > 0) {
                $tokens[] = $item;
            }
            unset($item);
        }

        if (count($tokens) != 4) {
            throw new Exception("Error: Please, check your input syntax.");
        }

        $db->beginTransaction();

        $lastInsertStudent = insertStudent($db, $tokens);
        $lastInsertCourse = insertCourse($db, $tokens);
        insertStudentSubscriptions($db, $lastInsertStudent, $lastInsertCourse);

        $db->commit();

    } catch (Exception $e) {
        $db->rollBack();
        echo $e->getMessage();
    }
}

function insertStudent(\Adapter\PDODatabase $db, array $tokens): int
{
    $stmt = $db->prepare("INSERT INTO students (first_name, last_name, student_number)
          VALUES (?, ?, ?)
    ");

    $stmt->execute(array(
        $tokens[0],
        $tokens[1],
        $tokens[2]
    ));

    return intval($db->lastInsertId());
}

function insertCourse(\Adapter\PDODatabase $db, array $tokens): int
{
    $stmt = $db->prepare('INSERT INTO courses (course_name)
        VALUES (?)');

    $stmt->execute(array(
        $tokens[3]
    ));

    return intval($db->lastInsertId());
}

function insertStudentSubscriptions(\Adapter\PDODatabase $db, int $lastInsertStudent, int $lastInsertCourse): int
{
    $stmt = $db->prepare('INSERT INTO student_subscriptions (course_id, student_id)
        VALUES (?, ?)');

    $stmt->execute(array(
        $lastInsertCourse,
        $lastInsertStudent
    ));

    return intval($db->lastInsertId());
}