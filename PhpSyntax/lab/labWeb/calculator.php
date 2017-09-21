<?php
//11.Lab Web

$output = "";
if (isset($_GET["calculate"])){
    $number_one = intval($_GET["number_one"]);
    $number_two = intval($_GET["number_two"]);

    if ($_GET["operation"] === "sum"){
        $sum = $number_one + $number_two;
        $output = "Sum: " . $sum;
    } elseif ($_GET["operation"] === "subtract"){
        $subtract = $number_one - $number_two;
        $output = "Subtract: " . $subtract;
    }
}

include("calculator_frontend.php");