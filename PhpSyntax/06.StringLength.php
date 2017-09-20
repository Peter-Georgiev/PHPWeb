<?php
error_reporting(E_ALL ^E_NOTICE);
$readLine = trim(fgets(STDIN));

$message = "";
for ($i = 0; $i < 20; $i++) {
    if ($i >= strlen($readLine)) {
        $message .= "*";
    } else {
        $message .= $readLine[$i];
    }
}
echo $message;