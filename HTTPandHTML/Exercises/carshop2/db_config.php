<?php
$db_host = "10.0.1.22";
$db_name = "cars";
$db_user = "root";
$db_password = '4545';

// Methods
$db = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host . ";charset=utf8", $db_user, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);