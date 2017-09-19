<?php

$result = "";
if (isset($_GET["calculate"])){
    $number_one = intval($_GET["number_one"]);
    $number_two = intval($_GET["number_two"]);

    if ($_GET["operation"] === "sum"){
        $sum = $number_one + $number_two;
        $result = "<li style='color: red;'>Sum: " . $sum . "</li>";
    } elseif ($_GET["operation"] === "subtract"){
        $subtract = $number_one - $number_two;
        $result = "<li style='color: blue';>Subtract: " . $subtract . "</li>";
    }
}
?>
<form method="get">
<div>
Operation:
<select name="operation">
<option value="sum">Sum</option>
<option value="subtract">Subtract</option>
</select>
</div>
<div>
Number 1:
<input type="text" name="number_one" value="<?php if(isset($number_one)) echo $number_one?>"/>
</div>
<div>
Number 2:
<input type="text" name="number_two" value="<?php if (isset($number_two)) echo $number_two?>"/>
</div>
<div>
<input type="submit" name="calculate" value=" Calculate! " />
</div>
</form>
<?= $result ?>