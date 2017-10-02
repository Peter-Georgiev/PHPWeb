<?php
declare(strict_types=1);

class Fibonacci
{
    private $fibonacciSequence = [0, 1];
    private $startIndex;
    private $endIndex;

    /**
     * Fibonacci constructor.
     * @param int $startIndex
     * @param int $endIndex
     */
    public function __construct(int $startIndex, int $endIndex)
    {
        $this->startIndex = $startIndex;
        $this->endIndex = $endIndex;
    }

    /**
     * @return array
     */
    private function fibonacciRange(): array
    {
        for ($i = 2; $i < $this->endIndex; $i++) {
            $a = $this->fibonacciSequence[$i - 2];
            $b = $this->fibonacciSequence[$i - 1];
            $this->fibonacciSequence[] = $a + $b;
        }

        return $this->fibonacciSequence =
            array_slice($this->fibonacciSequence, $this->startIndex, $this->endIndex);
    }

    /**
     * @return array
     */
    public function getFibonacciSequence(): array
    {
        $this->fibonacciRange();
        return $this->fibonacciSequence;
    }
}

$start = intval(fgets(STDIN));

$end = intval(fgets(STDIN));

$numberFib = new Fibonacci($start, $end);

echo implode(', ', $numberFib->getFibonacciSequence());