<?php
require_once 'common.php';
$userService = new \TaskManagement\Service\UserService(new \TaskManagement\Repository\UserRepository($db));
$userHandler = new \TaskManagement\Http\UserHttpHandler($userService, $template, $dataBinder);

$userHandler->register($_POST);