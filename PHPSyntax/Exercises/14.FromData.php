<?php
$errorMessages = '';
$messages = '';

if (isset($_GET['sbm'])){

    if (strlen($_GET['name']) == 0 || strlen($_GET['age']) == 0){
        $errorMessages = 'The field is not completed';
    } elseif (!isset($_GET['sex'])){
        $errorMessages = 'The button is not checked.';
    } else {
        $name = $_GET['name'] ;
        $age = intval($_GET['age']);
        $sex = $_GET['sex'];

        $messages = "My name is $name. I am $age years old. I am $sex.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>From data</title>
    <style type="text/css">
        input {
            margin: 0px 0px 5px 0px;
        }
    </style>
</head>
<body>
<div>
    <form method="get">
        <input type="text" name="name" placeholder="Name..."/><br/>
        <input type="number" name="age" placeholder="Age..."/><br/>
        <input type="radio" name="sex" value="male"/>Male<br/>
        <input type="radio" name="sex" value="female"/>Female<br/>
        <input type="submit" name="sbm" value="Submit"/>
    </form>
</div>
<div>
    <table>
        <?= $messages != '' ? $messages : $errorMessages; ?>
    </table>
</div>
</body>
</html>