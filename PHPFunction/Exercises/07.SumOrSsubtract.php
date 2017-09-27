<?php
// DON'T WORKS!
declare(strict_types=1);

$input = [
    ['sum' => 12, 13],
    ['subtract' => 3, 3],
    ['sum' => 1, 2],
    ['subtract' => 3, 3]
];

$opSum = function ($a, $b) {
    return $a + $b;
};

$opSubtract = function ($a, $b) {
    return $a - $b;
};

$simpleCalc = function (&$simpleCalc, $input, $i = 0, $output = []) use ($opSum, $opSubtract) {
    if ($i < count($input)) {
        $op = $input[$i][0];
        $a = $input[$i][1];
        $b = $input[$i][2];

        if ($op == 'sum') {
            $output[] = $opSum($a, $b);
            return $simpleCalc($simpleCalc, $input, $i = 0, $output);
        } elseif ($op == 'subtract') {
            $output[] = $opSubtract($a, $b);
            return $simpleCalc($simpleCalc, $input, $i = 0, $output);
        }
    } else {
        return $output;
    }
};
$output = $simpleCalc($simpleCalc, $input);

print_r($output);