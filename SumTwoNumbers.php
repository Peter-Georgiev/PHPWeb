<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sum Two Numbers</title>
</head>
<body>
<form method="get">
    Number 'M': <input type="number" name="m" /><br>
    Number 'N': <input type="number" name="n"/><br>
    <input type="submit" name="sbm"/>
</form>
</body>
</html>
<?php
if (isset($_GET['sbm'])) {
    $m = intval($_GET['m']);
    $n = intval($_GET['n']);
    $sum = $n + $m;
    echo $sum;
}