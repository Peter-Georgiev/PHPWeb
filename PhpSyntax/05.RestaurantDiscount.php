<?php
$hall = array(
    50 => array("2500", "Small Hall"),
    100 => array("5000", "Terrace"),
    120 => array("7500", "Great Hall"));
$packages = array(
    'Normal' => array(0.5, 500),
    'Gold' => array(0.10, 750),
    'Platinum' => array(0.15, 1000));

$groupSize = intval(trim(fgets(STDIN)));
$packageType = trim(fgets(STDIN));

$hallPrice = -1;
$hallName = "";
$endKeyHall = intval(end(array_keys($hall)));
if ($groupSize <= $endKeyHall){
    foreach ($hall as $key => $value) {
        if ($groupSize <= $key) {
            $hallPrice = intval($value[0]);
            $hallName = $value[1];
            break;
        }
    }
}


if ($hallPrice > -1 && array_key_exists($packageType, $packages)) {
    foreach ($packages as $key => $value) {
        if ($packageType == $key) {
            $discount = $value[0];
            $pricePackage = $value[1];

            $toal = number_format((($hallPrice + $pricePackage) -
                    (($hallPrice + $pricePackage) * $discount)) / $groupSize,
                2, '.', '');
        }
    }
    echo "We can offer you the $hallName\n";
    echo "The price per person is $toal\$";
} else {
    echo "We do not have an appropriate hall.";
}
