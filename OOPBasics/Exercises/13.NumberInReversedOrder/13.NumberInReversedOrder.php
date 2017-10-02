<?php
declare(strict_types=1);

class DecimalNumber
{
    private $numberStr;

    public function __construct(string $numberStr)
    {
        $this->numberStr = $numberStr;
    }

    private function revers() : string
    {
        return  strrev($this->numberStr);
    }

    public function __toString()
    {
        return $this->revers();
    }
}

$number = trim(fgets(STDIN));

$reversedOrder = new DecimalNumber($number);

echo $reversedOrder;