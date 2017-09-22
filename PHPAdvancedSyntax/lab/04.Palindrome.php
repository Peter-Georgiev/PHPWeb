<?php
declare(strict_types = 1);
(string)$readLine = trim(fgets(STDIN));

printResult(isPalindrome($readLine));

function isPalindrome(string $str) {
    for ($i = 0; $i < strlen($str) / 2; $i++) {
        if ($str[$i] != $str[strlen($str) - $i - 1]){
            return false;
        }
    }
    return true;
}

function printResult(bool $isPalindrome){
    if ($isPalindrome){
        echo 'true';
    } else {
        echo 'false';
    }
}