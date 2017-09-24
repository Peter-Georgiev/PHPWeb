<?php
declare(strict_types=1);

$input = intval(trim(fgets(STDIN)));

printDNAHelix($input);

function printDNAHelix(int $input)
{
    $symbol = 'ATCGTTAGGG';
    $count = 0;
    for ($i = 0; $i < $input; $i++) {
        if ($i % 4 == 0) {
            echo "**${symbol[$count % 10]}${symbol[$count % 10 + 1]}**\n";
        } else if ($i % 4 == 1) {
            echo "*${symbol[$count % 10]}--${symbol[$count % 10 + 1]}*\n";
        } else if ($i % 4 == 2) {
            echo "${symbol[$count % 10]}----${symbol[$count % 10 + 1]}\n";
        } else if ($i % 4 == 3) {
            echo "*${symbol[$count % 10]}--${symbol[$count % 10 + 1]}*\n";
        }

        $count += 2;
    }
}