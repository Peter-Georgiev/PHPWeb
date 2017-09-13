<?php
error_reporting(E_ALL ^E_NOTICE);
try {
    if (isset($_GET['sbm']) && strlen(trim($_GET['amount'])) > 0 &&
        strlen($_GET['currency']) > 0 && strlen(trim($_GET['interestAmount'])) > 0) {
        $amount = $_GET['amount'];
        $currency = $_GET['currency'];
        $interestAmount = $_GET['interestAmount'];

        $month;
        $arr = $_GET['arr'];
        foreach ($arr as $item) {
            switch ($item) {
                case '6_month':
                    $month = 6;
                    break;
                case '1_year':
                    $month = 1 * 12;
                    break;
                case '2_year':
                    $month = 2 * 12;
                    break;
                case '3_year':
                    $month = 3 * 12;
                    break;
                case '4_year':
                    $month = 4 * 12;
                    break;
                case '5_year':
                    $month = 5 * 12;
                    break;
            }
        }

        $result = $amount;
        $percent = ($interestAmount / 12) + 100;
        for ($i = 1; $i <= $month; $i++) {
            $result = (($result * $percent) / 100);
        }
        $message;
        switch ($currency) {
            case 'usd':
                $message = '&dollar;' . sprintf('%.02f', $result);
                break;
            case 'eur':
                $message = '&euro;' . sprintf('%.02f', $result);
                break;
            case 'bgn':
                $message = sprintf('%.02f', $result) . '&#1083;&#1074;';
                break;
        }
        echo $message;
    } elseif (isset($_GET['sbm'])) {
        echo 'Empty field!';
    }
} catch (Exception $e) {
    echo '';
}

?>
<!DOCTYPE html>
<style>
    div {
        margin: 15px 0 0 0;
    }
    select {
        margin: 0 8px 0 0;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Tags</title>
</head>
<body>
<form method="get">
    <div>
        Enter Amount
        <input type="number" name="amount"/>
    </div>
    <div>
        <input type="radio" name="currency" value="usd"/>USD
        <input type="radio" name="currency" value="eur"/>EUR
        <input type="radio" name="currency" value="bgn"/>BGN<br/>
    </div>
    <div>
        Compound Interest Amount
        <input type="number" name="interestAmount"/>
    </div>
    <div>
        <select name="arr[]">
           <!-- <option>interest amount</option> -->
            <option value="6_month">6 Mounths</option>
            <option value="1_year">1 Year</option>
            <option value="2_years">2 Years</option>
            <option value="3_years">3 Years</option>
            <option value="4_years">4 Years</option>
            <option value="5_years">5 Years</option>
        </select>
        <input type="submit" name="sbm" value="Calculate">
        <?=$message?>
    </div>
</form>
</body>
</html>
