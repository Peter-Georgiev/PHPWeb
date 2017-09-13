<!DOCTYPE html>
<style>
    caption {
        text-align: left;
    }
    .field {
        margin: 8px 4px 0 0;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Tags</title>
</head>
<body>
<form method="get">
    <table>
        <caption>Enter Tags:</caption>
        <td>
            <input type="text" class="field" name="field" />
            <input type="submit" name="submit"/>
        </td>
    </table>
</form>
</body>
<?php
if (isset($_GET['submit']) && strlen(trim($_GET['field'])) > 0) {
    $_arr = explode(',', $_GET['field']);
    $arr = array_map('trim', $_arr);

    $equalStr = array();
    foreach ($arr as $v) {
        if (array_key_exists($v, $equalStr)) {
            $equalStr[$v]++;
        } else {
            $equalStr[$v] = 1;
        }
    }

    arsort($equalStr);

    echo '<br/>';
    printArr($equalStr);

    $message = takeFirstItems($equalStr);
    echo "<br/>Most Frequent Tag is: $message";
}

function printArr ($array) {
    foreach ($array as $k => $v) {
        echo $k . ' : ' . $v . ' times<br/>';
    }
}

function takeFirstItems($array) {
    foreach ($array as $k => $v) {
        return $k;
    }
}