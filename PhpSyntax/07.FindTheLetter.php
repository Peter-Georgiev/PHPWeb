<?php
$sentence = trim(fgets(STDIN));
$tokens = explode(' ', trim(fgets(STDIN)));

$ch = $tokens[0];
$num = intval($tokens[1]);

$count = 0;
$hasChar = true;
for ($i = 0; $i <= strlen($sentence); $i++){
    if ($count == $num){
        $count = $i - 1;
        $hasChar = false;
        break;
    }

    if ($sentence[$i] == $ch){
        $count++;
    }
}

if ($hasChar || count($tokens) != 2){
    echo "Find the letter yourself!";
} else {
    echo $count;
}