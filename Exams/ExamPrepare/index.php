<?php
require_once 'common.php';
$homeHandler = new \TaskManagement\Http\HomeHttpHandler($template, $dataBinder);
$homeHandler->index();