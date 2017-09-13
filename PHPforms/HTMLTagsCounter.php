<?php
error_reporting(E_ALL ^E_NOTICE);
session_start();
$message;
if (isset($_GET['sbm']) && strlen(trim($_GET['field'])) > 0) {
    $tag = trim($_GET['field']);
    $arrTags = array("html", "head", "body", "div");

    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    } else {
        $_SESSION['score']++;
    }

    $score = $_SESSION['score'];
    if (in_array($tag, $arrTags)) {
        $message = "<h3>Valid HTML tag!<br/>Score: $score</h3>";
    } else {
        $message = "<h3>Invalid HTML tag!<br/>Score: $score</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    div {
        margin: 0 0 18px 0;
    }
    .field {
        margin: 0 8px 0 0 ;
    }
</style>
<head>
    <meta charset="UTF-8">
    <title>HTML Tags Counter</title>
</head>
<body>
<form>
    <div>
        Enter HTML tag:
    </div>
    <div>
        <input type="text" name="field" style="field" />
        <input type="submit" name="sbm" />
    </div>
    <div>
        <?=$message?>
    </div>
</form>
</body>
</html>