<?php
require_once "common.php";
$userRepository = new \TaskManagement\Repository\UserRepository($db);
$userService = new \TaskManagement\Service\UserService($userRepository);
$userHttpHanled = new \TaskManagement\Http\UserHttpHanler($userService, $template, $dataBinder);
$userHttpHanled->register($_POST);