<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sum Two Numbers</title>
</head>
<body>
<form method="get">
    Input: <input type="number" name="in" /><br>
    <input type="submit" name="sbm"/>
</form>
</body>
</html>

<?php
if (isset($_GET['sbm'])) {

    $number = intval($_GET['in']);
    $hasNonRepeating = false;
    $nonRepeating = array();

    for ($i = 100; $i <= $number; $i++) {

        if (strlen((string)$i) > 3) {
            break;
        }

        $firstDigit = (int)($i % 10);
        $secondDigit = (int)($i / 10) % 10;
        $thirdDigit = (int)($i / 100);

        if ($firstDigit != $secondDigit && $secondDigit != $thirdDigit && $firstDigit != $thirdDigit) {
            array_push($nonRepeating, $i);
            $hasNonRepeating = true;
        }
    }

    if ($hasNonRepeating) {
        echo implode(', ', $nonRepeating);
    } else {
        echo 'no';
    }
}