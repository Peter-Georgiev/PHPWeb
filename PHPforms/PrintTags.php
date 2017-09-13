<!DOCTYPE html>
<style>
    caption {
        text-align: left;
    }

    .textIn {
        margin: 9px 3px 0 0;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Tags</title>
</head>
<body>
<form>
    <table>
        <caption>Enter Tags:</caption>
        <td>
            <input type="text" name="textIn" class="textIn"/>
            <input type="submit" name="submit"/>
        </td>
    </table>
</form>
</body>
</html>
<?php
if (isset($_GET['submit']) && strlen(trim($_GET['textIn'])) > 0) {
    $str = trim($_GET['textIn']);
    $arr = explode(',', $_GET['textIn']);
    $count = 0;
    foreach ($arr as $item) {
        echo $count++ . ' : '.trim($item) . '<br/>';
    }
}