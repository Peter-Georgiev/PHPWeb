<?php
// Load DB
include "db_config.php";

// Load core classes
include "core/Model.php";
include "core/Controller.php";

// Load model classes - they extend Model.php
include "model/AddressesModel.php";
include "model/EmployeesModel.php";

// Load Controller class - it extends Controller.php
include "controller/MainController.php";
include "controller/EmployeeController.php";

// Todo
$route_error = false;

if (!empty($_GET["controler"])) {
    if (preg_match("/^[A-Za-z]+$/", $_GET["controler"])) {
        $controler = $_GET["controler"];
    } else {
        $route_error = true;
    }
} else {
    $controler = "MainController";
}

if (!empty($_GET["action"])) {
    if (preg_match("/^[A-Za-z]+$/", $_GET["action"])) {
        $action = $_GET["action"];
    } else {
        $route_error = true;
    }
} else {
    $action = "main";
}

if ($route_error === false) {
    //html error
    $c = new $controler($db);
    $c->$action();
}

