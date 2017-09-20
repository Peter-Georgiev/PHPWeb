<?php
error_reporting(E_ALL ^E_NOTICE);
$tokens = [];

$tokens[] = intval(trim(fgets(STDIN)));
$tokens[] = intval(trim(fgets(STDIN)));

echo "Start loop.\n";
for ($i = min($tokens); $i <= max($tokens); $i++){
    echo $i . "\n";
}
