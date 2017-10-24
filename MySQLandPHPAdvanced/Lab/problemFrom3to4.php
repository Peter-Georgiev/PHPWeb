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

$stmt = getInfo($db);

foreach ($stmt as $value) {
    echo $value["full_name"] . ' - ' .
        $value["student_number"] . ' : ' .
        $value["course_name"] . PHP_EOL;
}


function getInfo(\Adapter\PDODatabase $db)
{
    $stmt = $db->prepare("SELECT concat_name(s.first_name, s.last_name) AS full_name,
          s.student_number, c.course_name
        FROM students AS s
        INNER JOIN student_subscriptions
          USING (student_id)
        INNER JOIN courses AS c
          USING (course_id)
        ORDER BY s.student_number
    ");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
