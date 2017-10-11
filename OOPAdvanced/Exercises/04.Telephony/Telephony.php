<?php
declare(strict_types=1);

class Telephony implements Phone, Call
{
    const MODEL = "Smartphone ";

    public function model()
    {
        echo self::MODEL;
    }

    public function call(string $callNumber)
    {
        if (!preg_match('/^\d+$/', $callNumber, $regex)) {
            echo "Invalid number!" . PHP_EOL;
        } else {
            echo "Calling... " . $callNumber . PHP_EOL;
        }
    }

    public function browsing(string $browsingWeb)
    {
        if (!preg_match('/^[^0-9]*$/', $browsingWeb, $regex)) {
            echo "Invalid URL!" . PHP_EOL;
        } else {
            echo "Browsing: " . $browsingWeb . '!' . PHP_EOL;
        }
    }
}