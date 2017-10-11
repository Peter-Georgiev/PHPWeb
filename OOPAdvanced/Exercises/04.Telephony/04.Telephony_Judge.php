<?php
declare(strict_types=1);

interface Call
{
    public function call(string $callNumber);
}

interface Phone
{
    public function model();

    public function browsing(string $browsingWeb);
}

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

$inputFirst = trim(fgets(STDIN));
$inputSecond = trim(fgets(STDIN));

foreach (explode(' ', $inputFirst) as $value) {
    $call = new Telephony();
    $call->call($value);
}

foreach (explode(' ', $inputSecond) as $value) {
    $web = new Telephony();
    $web->browsing($value);
}