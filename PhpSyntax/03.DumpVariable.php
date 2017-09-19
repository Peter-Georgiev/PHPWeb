<?php
error_reporting(E_ALL ^E_NOTICE);
$input = (object)[2,34];

if (isset($input)) {
    if (gettype($input) == integer || gettype($input) == double) {
        echo gettype($input).'('.$input.')';
    } else {
        echo gettype($input);
    }
}