<?php
$_GET['data'] = array(
    'dateOne' => '17-12-2014',
    'dateTwo' => '31-12-2014',
    'holidays' => '31-12-2014
24-12-2014
08-12-2014',
);

$startDate = new DateTime($_GET['data']['dateOne']);
$endDate = new DateTime($_GET['data']['dateTwo']);
$holidays = explode(PHP_EOL, $_GET['data']['holidays']);
$output = [];
for ($dt = $startDate; $dt <= $endDate; $dt->add(new DateInterval("P1D"))) {
    if (in_array($dt->format("d-m-Y"), $holidays) ||
        $dt->format('N') == 6 || $dt->format('N') == 7) {
        continue;
    }

    $output[] = "<li>" . $dt->format("d-m-Y") . "</li>";
}

echo "<ol>";
if (count($output) > 0 ){
    foreach ($output as $value) {
        echo $value;
    }
} else {
    echo "<li>No workdays</li>";
}
echo "</ol>";