<?php
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);

$sql = "SELECT COUNT(id) AS countID
                FROM users";

$sth = $pdo->prepare($sql);
$sth->execute();
$c = $sth->fetchAll();
var_dump($c);