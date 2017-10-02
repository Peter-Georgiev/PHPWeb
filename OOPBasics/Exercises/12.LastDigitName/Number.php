<?php
declare(strict_types=1);

class Number
{
    private $number;
    private $digitName;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    private function returnDigitName(): string
    {
        $this->number %= 10;
        switch ($this->number) {
            case 0:
                $this->digitName = 'zero';
                break;
            case 1:
                $this->digitName = 'one';
                break;
            case 2:
                $this->digitName = 'two';
                break;
            case 3:
                $this->digitName = 'three';
                break;
            case 4:
                $this->digitName = 'four';
                break;
            case 5:
                $this->digitName = 'five';
                break;
            case 6:
                $this->digitName = 'six';
                break;
            case 7:
                $this->digitName = 'seven';
                break;
            case 8:
                $this->digitName = 'eight';
                break;
            case 9:
                $this->digitName = 'nine';
                break;
        }
        return $this->digitName;
    }

    public function __toString()
    {
        return $this->returnDigitName();
    }
}