<?php
// front layer
require_once 'common.php';

$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);

var_dump($userService->viewAll());


$EmailRepository = new \App\Repository\EmailRepository($db);
$EmailService = new \App\Service\EmailService($EmailRepository);
$EmailHttpHandler = new \App\Http\EmailHttpHandler($template, $binder);
$EmailHttpHandler->allMail($EmailService);
