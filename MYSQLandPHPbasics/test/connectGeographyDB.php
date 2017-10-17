<?php
declare(strict_types=1);
Include("db_cofig.php");

$db = new PDO("mysql:dbname=$db_name;host=$host", $db_user, $db_password);
