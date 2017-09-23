<?php
$name = '';
$phone = '';
$age = 0;
$address = '';
$message = '';

if (isset($_GET['sbm'])){
    $readText = $_GET['input'];

    preg_match("/(?<name>[A-Za-z\s]+)\s*,\s*(?<phone>[\d\-\s\+]+)\s*\,\s*(?<age>[0-9]{1,3})\s*,\s*(?<address>.+)/",
        $readText, $text);

    if (count($text) > 0){
        $name = $text['name'];
        $phone = $text['phone'];
        $age = intval($text['age']);
        $address = $text['address'];
    } else {
        $message = 'Incorrect format!';
    }
}
?>
<!DOCTYPE html>
<style type="text/css">
    table, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .heading {
        background-color: #da9733;
        padding-right: 5px;
    }

    .data {
        padding-right: 19ch;
    }

    form {
        margin: 10px 0 10px 0;
    }

    .line {
        text-align: left;
        width: 249px;
        height: 100px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML Table</title>
</head>
<body>
<div>
    <table>
        <tr>
            <td class="heading">Name</td>
            <td class="data"><?=$name;?></td>
        </tr>
        <tr>
            <td class="heading">Phone number</td>
            <td class="data"><?=$phone;?></td>
        </tr>
        <tr>
            <td class="heading">Age</td>
            <td class="data"><?= isset($_GET['sbm']) && count($text) > 0 ? $age : ''; ?></td>
        </tr>
        <tr>
            <td class="heading">Address</td>
            <td class="data"><?=$address;?></td>
        </tr>
    </table>
</div>
<?= $message != '' ? "<div>\n\t<h1>".$message."</h1>\n</div>" : '';?>
<div>
    <form method="get">
        <textarea class="line" id="input" name="input" placeholder="In the following format: name, phone number, age, address"></textarea>
        <br/>
        <input type="submit" name="sbm" value="Submit"/>
    </form>
</div>
</body>
</html>