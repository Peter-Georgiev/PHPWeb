<?php
declare(strict_types=1);

$input = 'Hello, there! ';
$n = 3;

$repeatString = function (&$repeatString, string &$input, int $n = 1, string $out = ""): string {
    return $n > 0 ?
        $repeatString($repeatString, $input, $n - 1, $out .= $input) : // Recursion
        $out;
}; // anonymous function

echo $repeatString($repeatString, $input, $n); //Side effect
