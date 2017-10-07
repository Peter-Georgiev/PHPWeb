<?php
declare(strict_types=1);
include "OnlineRadio.php";
include "Playlist.php";

$data = new Playlist();

$n = intval(fgets(STDIN));
while ($n--) {
    $input = trim(fgets(STDIN));

    list($artistName, $songName, $minutesSeconds) =
        explode(';', $input);

    try {
        $onlineRadio = new OnlineRadio($artistName, $songName, $minutesSeconds);
        $data->addSong($onlineRadio);
        echo 'Song added.' . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

echo $data;
//var_dump($data);