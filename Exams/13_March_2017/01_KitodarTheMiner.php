<?php

//$_GET['data'] = "mine bobovdol gold 10, mine tomn diamonds 5, mine colas Gold 10, mine myMine silver 14, mine silver14 siLver 14,";


if (isset($_GET['data'])) {

    $data = array('Gold' => 0, 'Silver' => 0, 'Diamonds' => 0);
    $tokens = explode(",", trim($_GET['data']));

    for ($i = 0; $i < count($tokens); $i++) {

        $str = trim(strtolower($tokens[$i]));

        if (preg_match('/^(mine)\s+(\w+)\s+(gold)\s+([0-9]+)$/', $str, $regexGold)) {
            $data['Gold'] += $regexGold[4];
            continue;
        }

        if (preg_match('/^(mine)\s+(\w+)\s+(silver)\s+([0-9]+)$/', $str, $regexSilver)) {
            $data['Silver'] += $regexSilver[4];
            continue;
        }

        if (preg_match('/^(mine)\s+(\w+)\s+(diamonds)\s+([0-9]+)$/', $str, $regexDiamond)) {
            $data['Diamonds'] += $regexDiamond[4];
            continue;
        }
    }

    foreach ($data as $key => $value) {
        echo "<p>*" . $key . ": " . $value . "</p>";
    }
}