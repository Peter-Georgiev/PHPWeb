<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});
$db = null;
try {
    $db = new PDO ("mysql:host=localhost;dbname=phonebook;charset=utf8", "root", "peroxmen");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$stmt = $db->prepare("SELECT * FROM cities");
$stmt->execute();
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($cities);
include "register_frontend.php";

if (isset($_POST["submit"])){
    var_dump($_POST);
    //echo "POST";
}


