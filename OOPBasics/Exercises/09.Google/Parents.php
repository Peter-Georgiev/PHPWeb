<?php
declare(strict_types=1);

class Parents
{
    private $parentName;
    private $parentBirthday;

    public function __construct(string $parentName, string $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }

    public function __toString()
    {
        return $this->parentName . ' ' . $this->parentBirthday;
    }
}