<?php
declare(strict_types=1);

try {
    $db = new PDO ("mysql:host=localhost;dbname=web_lab;charset=utf8", "root", "");
    echo "Connection successful" . PHP_EOL;
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}
/*
$user_id = 2;
$data = $db->prepare('SELECT * FROM users WHERE user_id = ?');
$data->execute(array($user_id));
while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
*/

/*
$stmt = $db->prepare('INSERT INTO users (user_name, first_name, last_name, create_date, years) 
VALUES (:user_name, :first_name, :last_name, NOW(), :years)');

$user_name = 'ivan559';
$first_name = 'Ivan559';
$last_name = 'Ivanov559';
$year = 32;

$stmt->bindParam('user_name', $user_name);
$stmt->bindParam('first_name', $first_name);
$stmt->bindParam('last_name', $last_name);
$stmt->bindParam('years', $year);

$stmt->execute();
echo $db->lastInsertId();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
*/

$stmt = $db->prepare('UPDATE users SET first_name = :first_name
                                WHERE  user_id = :id');

$first_name = 'Ivan559464';
$id = 12;

$stmt->bindParam('first_name', $first_name);
$stmt->bindParam('id', $id);

$stmt->execute();
echo $db->lastInsertId();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}