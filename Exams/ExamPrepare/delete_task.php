<?php
require_once 'common.php';
$taskRepository = new \TaskManagement\Repository\TaskRepository($db, $dataBinder);
$taskService = new \TaskManagement\Service\TaskService($taskRepository);
$taskHandler = new \TaskManagement\Http\TaskHttpHandler($template, $dataBinder);
$taskHandler->delete($taskService, $_GET);