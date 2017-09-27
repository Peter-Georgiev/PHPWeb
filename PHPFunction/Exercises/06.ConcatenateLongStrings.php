<?php
// DON'T WORKS!
declare(strict_types=1);

$input = ['Hello ', 'there.', 'This is just another long string', 'that would pass the check.', ' but', ' this', ' will', ' not', 'pass it.'];

$above = 20;
print_r(array_reduce($input,
    function ($carry, $item) use ($above) {
        return strlen($item) > $above ?
            $carry .= $item : $carry;
    }
));