<?php
session_start();
require_once "autoloader.php";

$template = new \Core\Template();

$binder = new \Core\DataBinder();

$dbInfo = parse_ini_file("Config/db.ini");

$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);

$db = new \Database\PDODatabase($pdo);