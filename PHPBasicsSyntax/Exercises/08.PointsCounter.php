<?php
//error_reporting(E_ALL ^E_NOTICE);
$data = [];
$readLine = '';
while ("Result" != $readLine = trim(fgets(STDIN))) {
    //•	The team names will be at least 2 characters long
    $removeSymbols = preg_replace("/([$%&@*]+)/", "", $readLine);

    preg_match("/(?<team>[A-Z]{2,})\s*\|\s*(?<player>[A-Z][a-z]+)\s*\|\s*(?<points>[0-9]+)/",
        $removeSymbols, $teamPlayerMatch);
    if (count($teamPlayerMatch) > 0) {
        $points = intval($teamPlayerMatch["points"]);
        if ($points > 0 && $points < 101) { //•	The points for each player will be in the interval [1…100]
            $team = $teamPlayerMatch["team"];
            $player = $teamPlayerMatch["player"];

            $data[$team][$player] = $points;
        }
    }

    preg_match("/(?<player>[A-Z][a-z]+)\s*\|\s*(?<team>[A-Z]{2,})\s*\|\s*(?<points>[0-9]+)/",
        $removeSymbols, $playerTeamMatch);
    if (count($playerTeamMatch) > 0) {
        $points = intval($playerTeamMatch["points"]);
        if ($points > 0 && $points < 101) { //•	The points for each player will be in the interval [1…100]
            $player = $playerTeamMatch["player"];
            $team = $playerTeamMatch["team"];

            $data[$team][$player] = $points;
        }
    }
}

printResult($data, sortTeam($data));

function sortTeam($data){
    $teams = [];
    foreach ($data as $key => $value) {

        $sum = 0;
        foreach ($value as $k => $v) {
            $sum += $v;
        }
        $teams[$key] = $sum;
    }

    arsort($teams);
    return $teams;
}

function printResult($data, $teams){
    foreach ($teams as $key => $value) {
        echo $key . ' => ' . $value . "\n\r";
        foreach ($data as $kPlayer => $vPlayer) {
            if ($key != $kPlayer) {
                continue;
            }
            arsort($vPlayer);
            foreach ($vPlayer as $k => $v) {
                echo "Most points scored by: $k" . "\n\r";
                break;
            }
        }
    }
}