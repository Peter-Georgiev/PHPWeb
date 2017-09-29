<?php
declare(strict_types=1);
namespace SoftUni\Oop;
/* Problem 06.	Rewrite a code */
class Math
{
    private $num_a;
    private $num_b;
    private $math_sum;
    private $math_div;

    /**
     * Math constructor.
     * @param float $a
     * @param float $b
     */
    public function __construct(float $a, float $b)
    {
        $this->num_a = $a;
        $this->num_b = $b;
    }

    /**
     * @return float
     */
    public function getMathSum(): float
    {
        $this->math_sum = $this->num_a + $this->num_b;
        return $this->math_sum;
    }

    /**
     * @return float
     */
    public function getMathDiv(): float
    {
        if($this->isZero($this->num_a) || $this->isZero($this->num_b)){
            exit("division by zero is not possible");
            //throw new \Exception("division by zero is not possible");
        }
        $this->math_div = $this->num_a / $this->num_b;
        return $this->math_div;
    }

    /**
     * @param float $num
     * @return bool
     */
    private function isZero(float $num): bool
    {
        return $num == 0;
    }
}