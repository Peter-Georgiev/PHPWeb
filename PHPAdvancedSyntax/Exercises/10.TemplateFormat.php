<?php
declare(strict_types=1);

$input = explode(", ", trim(fgets(STDIN)));

printXML($input);

function printXML(array $input) {
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<quiz>\n";
    for ($i = 0; $i < count($input); $i++) {
        if ($i % 2 == 0) {
            echo "\t<question>\n\t\t$input[$i]\n\t</question>\n";
        } else {
            echo "\t<answer>\n\t\t$input[$i]\n\t</answer>\n";
        }
    }
    echo "</quiz>";
}