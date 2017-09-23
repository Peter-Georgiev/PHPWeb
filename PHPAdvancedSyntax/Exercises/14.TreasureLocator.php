<?php
$input = explode(", ", trim(fgets(STDIN)));

for($i=0; $i < count($input); $i = $i + 2) {
    $x = $input[$i];
    $y = $input[$i + 1];

    if(checkTokelau($x, $y)) {
        echo "Tokelau\n\r";
    } elseif (checkTuvalu($x, $y)) {
        echo "Tuvalu\n\r";
    } elseif(checkSamoa($x, $y)) {
        echo "Samoa\n\r";
    } elseif (checkTonga($x, $y)) {
        echo "Tonga\n\r";
    } elseif(checkCook($x, $y)) {
        echo "Cook\n\r";
    } else {
        echo "On the bottom of the ocean\n\r";
    }
}

function checkTokelau($x, $y){
    if($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1){
        return true;
    }
    return false;
}

function checkTuvalu($x, $y){
    if($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3){
        return true;
    }
    return false;
}

function checkSamoa ($x, $y){
    if($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6){
        return true;
    }
    return false;
}

function checkTonga($x, $y){
    if($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8){
        return true;
    }
    return false;
}

function checkCook($x, $y){
    if($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8){
        return true;
    }
    return false;
}
