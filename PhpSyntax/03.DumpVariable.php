<?php
error_reporting(E_ALL ^E_NOTICE);
//$input = trim(fgets(STDIN));
$input = array(1,2,3);
$input = (object)[2,34];
//$input = 1.234;

if (is_numeric($input)) {
    echo var_dump($input);
} else {
    echo gettype($input);
}
?>