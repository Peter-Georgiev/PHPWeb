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
<?php if (isset($output)):?>
<ul>
    <li tyle='color: red';>
        <?= $output; ?>
    </li>
</ul>
<?php endif;?>
<?php
//11.Lab Web
