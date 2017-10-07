<?php
declare(strict_types=1);

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