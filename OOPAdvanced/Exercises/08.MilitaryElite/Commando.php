<?php
declare(strict_types=1);

class Commando extends SpecialisedSoldier
{
    private $missionArr = [];

    public function __construct(string $firstName, string $lastName, $id, float $salary, string $corps, array $mission)
    {
        parent::__construct($firstName, $lastName, $id, $salary, $corps);
        $this->setMission($mission);
    }

    private function setMission($mission)
    {
        $count = count($mission);
        if ($count == 0) {
            return '';
        }
        for ($i = 0; $i < $count; $i += 2) {
            if ($mission[$i + 1] == 'inProgress' || $mission[$i + 1] == 'finished') {
                $this->missionArr[$mission[$i]] = $mission[$i + 1];
            } else {
                throw new \Exception("Invalid mission state supplied");
            }
        }
    }

    public function getMission()
    {
        $partString = null;
        foreach ($this->missionArr as $key => $value) {
            $partString .= '  Code Name: ' . $key . ' State: ' . $value . PHP_EOL;
        }
        return $partString;
    }

    public function __toString()
    {
        return parent::__toString() . 'Missions:' . PHP_EOL . $this->getMission();
    }
}