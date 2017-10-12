<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

$output = [];
$privates = [];

while (true) {
    $input = array_map('trim', explode(' ', fgets(STDIN)));
    try {
        if ($input[0] == 'End') {
            break;
        }

        $id = $input[1];
        $firstName = $input[2];
        $lastName = $input[3];
        $salary = floatval($input[4]);

        if ($input[0] == 'Private') {
            $output[] = new PrivateSoldier($firstName, $lastName, $id, $salary);
            $privates[] = new PrivateSoldier($firstName, $lastName, $id, $salary);
        } else if ($input[0] == 'Spy') {
            $codeNumber = $input[4];
            $output[] = new Spy($firstName, $lastName, $id, $codeNumber);
        } else if (($input[0] == 'Engineer' || $input[0] == 'Commando') && ($input[5] == 'Marines' || $input[5] == 'Airforces')) {
            $parts = [];
            $corps = $input[5];

            for ($i = 6; $i < count($input); $i++) {
                $parts[] = $input[$i];
            }

            if ($input[0] == 'Engineer') {
                $output[] = new Engineer($firstName, $lastName, $id, $salary, $corps, $parts);
            } else if ($input[0] == 'Commando') {
                $output[] = new Commando($firstName, $lastName, $id, $salary, $corps, $parts);
            }
        } else if ($input[0] == 'LeutenantGeneral') {
            $output[] = new LeutenantGeneral($firstName, $lastName, $id, $salary, $privates);
        }
    } catch (\Exception $e) {
        echo ($e->getMessage()) . PHP_EOL;
    }
}

foreach ($output as $soldier) {
    echo $soldier;
}