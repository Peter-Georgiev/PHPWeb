<?php
// front layer
require_once 'common.php';

$userEmailRepository = new \App\Repository\UserEmailRepository($db);
$userEmailService = new \App\Service\UserEmailService($userEmailRepository);
$userEmailHttpHandler = new \App\Http\UserEmailHttpHandler($template, $binder);
$userEmailHttpHandler->oneUserPerMail($userEmailService);
