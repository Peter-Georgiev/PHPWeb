<?php
$contact = array(
    'Name' => 'Pesho',
    'Phone Number' => '0884-888-888',
    'Age' => '67',
    'Address' => 'Suhata Reka'
    );
?>
<!DOCTYPE html>
<style>
    table, th, td {
        width: 14em;
        border: 1px solid black;
        border-collapse: collapse;
    }
    th{
        background-color: #ff9a30;
        text-align: left;
    }
    td {
        width: 50%;
        text-align: right;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InformationTable</title>
</head>
<body>
<table>
    <?php
    foreach ($contact as $key => $value) {
        echo "\t\t<tr>\n
                \t\t\t<th>$key</th>\n
                \t\t\t<td>$value</td>\n
            \t\t</tr>\n";
    }
    ?>
</table>
</body>
</html>
