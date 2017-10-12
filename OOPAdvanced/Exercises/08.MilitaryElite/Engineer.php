<?php
declare(strict_types=1);

class Engineer extends SpecialisedSoldier implements IEngineer
{
    private $partsArr = [];
    public function __construct($firstName, $lastName, $id, float $salary, string $corps, array $parts)
    {
        parent::__construct($firstName, $lastName, $id, $salary, $corps);
        $this->setParts($parts);
    }
    private function setParts(array $parts)
    {
        $count = count($parts);
        for ($i = 0; $i < $count; $i += 2) {
            $this->partsArr[$parts[$i]] = $parts[$i + 1];
        }
    }
    public function getRepairs()
    {
        $partString = null;
        foreach ($this->partsArr as $key => $value) {
            $partString .= '  Part Name: ' . $key . ' Hours Worked: ' . $value . PHP_EOL;
        }
        return $partString;
    }
    public function __toString()
    {
        return parent::__toString() . 'Repairs:' . PHP_EOL . $this->getRepairs();
    }
}