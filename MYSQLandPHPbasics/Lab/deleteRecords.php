<?php
declare(strict_types=1);

$db = null;
try {
    $db = new PDO ("mysql:host=localhost;dbname=php-course;charset=utf8", "root", "***");
} catch (PDOException $e) {
    exit('Connection failed: ' . $e->getMessage());
}

$user_id = intval(fgets(STDIN));

$stmt = $db->prepare('DELETE FROM students WHERE id = :id');
$stmt->bindParam('id', $user_id);
$stmt->execute();
