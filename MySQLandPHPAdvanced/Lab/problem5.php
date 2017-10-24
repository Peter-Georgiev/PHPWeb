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

//$readCLI = trim(fgets(STDIN));

// INVALID STUDENT NUMBER
$readCLI = "Stanko Mihov 9999";

//$readCLI = "Stanko Mihov 10001";

try {
    foreach (explode(' ', $readCLI) as $item) {
        $item = trim($item);
        if (strlen($item) > 0) {
            $tokens[] = $item;
        }
        unset($item);
    }

    if (count($tokens) != 3) {
        throw new Exception("Error: Please, check your input syntax.");
    }

    $db->beginTransaction();

    $lastInsertStudent = insertStudent($db, $tokens);

    $db->commit();

    $stmt = getInfo($db, $lastInsertStudent);
    foreach ($stmt as $value) {
        echo "Insert DB: " . $value["full_name"] . ' - ' .
            $value["student_number"] . PHP_EOL;
    }

} catch (Exception $e) {
    $db->rollBack();
    echo $e->getMessage();
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

function getInfo(\Adapter\PDODatabase $db, int $student_id)
{
    $stmt = $db->prepare("SELECT concat_name(s.first_name, s.last_name) AS full_name,
          s.student_number
        FROM students AS s
        WHERE student_id = ?
    ");

    $stmt->execute(array(
        $student_id
    ));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
