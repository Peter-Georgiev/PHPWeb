<?php
declare(strict_types=1);
include "DateModifier.php";

$startDate = trim(fgets(STDIN));
$endDate = trim(fgets(STDIN));

$dateModifier = new DateModifier($startDate, $endDate);

echo $dateModifier;
