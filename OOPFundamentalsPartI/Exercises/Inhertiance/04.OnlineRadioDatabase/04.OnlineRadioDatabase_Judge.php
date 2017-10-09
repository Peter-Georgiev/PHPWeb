<?php
declare(strict_types=1);

class OnlineRadio
{
    private $artistName;
    private $songName;
    private $minutesSeconds;

    public function __construct(string $artistName, string $songName, string $minutesSeconds)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setMinutesSeconds($minutesSeconds);
    }

    private function setArtistName(string $artistName)
    {
        if (!in_array(strlen($artistName), range(3, 20))) {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    private function setSongName(string $songName)
    {
        if (!in_array(strlen($songName), range(3, 30))) {
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    private function setMinutesSeconds(string $minutesSeconds)
    {
        list($minuteStr, $secondStr) = explode(':', $minutesSeconds);
        $minutes = intval($minuteStr);
        $seconds = intval($secondStr);

        if (!in_array($minutes + $seconds, range(0, ((14 * 60) + 59)))) {
            throw new Exception("Invalid song length.");
        }

        if (!in_array($minutes, range(0, 14))) {
            throw new Exception("Song minutes should be between 0 and 14.");
        }

        if (!in_array($seconds, range(0, 59))) {
            throw new Exception("Song seconds should be between 0 and 59.");
        }
        $this->minutesSeconds = $seconds + ($minutes * 60);
    }

    public function getMinutesSeconds()
    {
        return $this->minutesSeconds;
    }
}

class Playlist
{
    private $songs = [];
    private $totalLengthOfThePlaylist = 0;

    public function addSong(OnlineRadio $song)
    {
        $this->songs[] = $song;
        $this->totalLengthOfThePlaylist += $song->getMinutesSeconds();
    }

    public function __toString() {
        $hours = floor($this->totalLengthOfThePlaylist / 3600);
        $minutes = floor(($this->totalLengthOfThePlaylist - $hours * 3600) / 60);
        $seconds = $this->totalLengthOfThePlaylist - (($hours * 3600) + ($minutes * 60));

        return "Songs added: " . count($this->songs) . PHP_EOL .
            "Playlist length: " . $hours . "h " .
            str_pad((string)$minutes, 2, '0', STR_PAD_LEFT) . "m " .
            str_pad((string)$seconds, 2, '0', STR_PAD_LEFT) . "s";

    }
}

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