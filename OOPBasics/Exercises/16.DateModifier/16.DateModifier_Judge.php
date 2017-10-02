<?php
declare(strict_types=1);

class DateModifier
{
    private $startDate;
    private $endDate;
    private $calculatesDifference;

    public function __construct(string $startDate, string $endDate)
    {
        $startDateTemp = explode(' ', $startDate);
        $endDateTemp = explode(' ', $endDate);

        $this->startDate = implode('-', $startDateTemp);
        $this->endDate = implode('-', $endDateTemp);
    }

    private function calculatesDiff()
    {
        $datetime1 = new DateTime($this->startDate);
        $datetime2 = new DateTime($this->endDate);
        $interval = $datetime1->diff($datetime2);
        return $this->calculatesDifference =
            $interval->format('%a');
    }

    public function __toString()
    {
        $this->calculatesDiff();
        return $this->calculatesDifference;
    }
}

$startDate = trim(fgets(STDIN));
$endDate = trim(fgets(STDIN));

$dateModifier = new DateModifier($startDate, $endDate);

echo $dateModifier;
