<?php
declare(strict_types=1);

interface Actions
{
    public function useBreke(): string;

    public function useGas(): string;
}

class Ferrari implements Actions
{
    static $objNum = 0;
    private $driver;
    const MODEL = "488-Spider";

    public function __construct(string $driver)
    {
        $this->driver = $driver;
        self::$objNum++;
    }

    static public function forUrl(string $str, string $rep = "-"): string
    {
        //return strtoupper(str_replace(" ", $rep, $str));
        return $str;
    }

    public function useBreke(): string
    {
        return "Brakes!";
    }

    public function useGas(): string
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
        return self::MODEL .
            "/" . $this->useBreke() .
            "/" . $this->useGas() .
            "/" . self::forUrl($this->driver);
            //. "/ Inst. " . self::$objNum;
    }
}

$driverName = trim(fgets(STDIN));
$car = new Ferrari($driverName);
echo $car;
