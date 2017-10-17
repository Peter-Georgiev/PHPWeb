<?php
declare(strict_types=1);

$db = null;
try {
    $db = new PDO ("mysql:host=localhost;dbname=php-course;charset=utf8", "root", "***");
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}

$tokens = explode(' ', trim(fgets(STDIN)));
if (count($tokens) != 3) {
    throw new Exception("input error");
}

$user_id = intval($tokens[0]);
$param_name = $tokens[1];

$stmt = $db->prepare("UPDATE students SET $param_name = :param_value WHERE id = :id");

$stmt->bindParam('param_value', $param_value);
$stmt->bindParam('id', $user_id);
$param_value = $tokens[2];

$stmt->execute();
