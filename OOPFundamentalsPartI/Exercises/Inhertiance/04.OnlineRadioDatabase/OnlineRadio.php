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
        if (strlen($artistName) < 3 || strlen($artistName) > 20) {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    private function setSongName(string $songName)
    {
        if (strlen($songName) < 3 || strlen($songName) > 30) {
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    private function setMinutesSeconds(string $minutesSeconds)
    {
        list($minuteStr, $secondStr) = explode(':', $minutesSeconds);
        $minutes = intval($minuteStr);
        $seconds = intval($secondStr);

        if (!in_array($minutes, range(0, 14))) {
            throw new Exception("Song minutes should be between 0 and 14.");
        }

        if (!in_array($seconds, range(0, 59))) {
            throw new Exception("Song seconds should be between 0 and 59.");
        }

        if (!in_array($minutes + $seconds, range(0, ((14 * 60) + 59)))) {
            throw new Exception("Invalid song length.");
        }

        $this->minutesSeconds = $seconds + ($minutes * 60);
    }

    public function getMinutesSeconds()
    {
        return $this->minutesSeconds;
    }

}