<?php
require_once 'common.php';
$taskRepository = new \TaskManagement\Repository\TaskRepository($db, $dataBinder);
$taskService = new \TaskManagement\Service\TaskService($taskRepository);
$categoryService = new \TaskManagement\Service\CategoryService(new \TaskManagement\Repository\CategoryRepository($db));
$userService = new \TaskManagement\Service\UserService(new \TaskManagement\Repository\UserRepository($db));
$taskHandler = new \TaskManagement\Http\TaskHttpHandler($template, $dataBinder);
$taskHandler->edit($taskService, $categoryService, $userService, $_POST, $_GET);