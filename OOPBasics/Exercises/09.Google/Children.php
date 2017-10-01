<?php
declare(strict_types=1);

class Children
{
    private $childName;
    private $childBithday;

    public function __construct(string $childName, string $childBirthday)
    {
        $this->childName = $childName;
        $this->childBithday = $childBirthday;
    }

    public function __toString()
    {
        return $this->childName . ' ' . $this->childBithday;
    }
}