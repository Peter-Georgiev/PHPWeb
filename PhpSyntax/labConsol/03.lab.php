<?php
$numbers = [];

while ($number = intval(fgets(STDIN))){
    $numbers[] = $number;
}
$max = max($numbers);
echo "Max: " . $max;