<?php
declare(strict_types=1);
include "Human.php";
include "Student.php";
include "Worker.php";



$firstLine = explode(' ', trim(fgets(STDIN)));
$student = new Student($firstLine[0], $firstLine[1], $firstLine[2]);

$secondLine = explode(' ', trim(fgets(STDIN)));
$worker = new Worker($secondLine[0], $secondLine[1], floatval($secondLine[2]), floatval($secondLine[3]));

echo $student . PHP_EOL . $worker;
