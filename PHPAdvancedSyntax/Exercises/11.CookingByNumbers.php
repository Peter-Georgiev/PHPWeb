<?php
declare(strict_types = 1);

$num = floatval(trim(fgets(STDIN)));
$commands = explode(', ', trim(fgets(STDIN)));

foreach ($commands as $command) {

    switch ($command){
        case 'chop':
            $num = commandChop($num);
            break;
        case 'dice':
            $num = commandDice($num);
            break;
        case 'spice':
            $num = commandSpice($num);
            break;
        case 'bake':
            $num = commandBake($num);
            break;
        case 'fillet':
            $num = commandFillter($num);
            break;
    }
    echo $num . "\n\r";
}

function commandChop(float $num){
    return $num / 2;
}

function commandDice(float $num){
    return sqrt($num);
}

function commandSpice(float $num){
    return $num + 1;
}

function commandBake(float $num){
    return $num * 3;
}

function commandFillter(float $num){
    return $num - ($num * 0.2);
}