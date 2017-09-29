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

    public function __construct($a, $b)
    {
        $this->num_a = $a;
        $this->num_b = $b;
    }

    /**
     * @return mixed
     */
    public function getMathSum()
    {
        $this->math_sum = $this->num_a + $this->num_b;
        return $this->math_sum;
    }

    /**
     * @return mixed
     */
    public function getMathDiv()
    {
        if($this->num_a == 0 || $this->num_b == 0){
            exit("division by zero is not possible");
            //throw new \Exception("division by zero is not possible");
        }
        $this->math_div = $this->num_a / $this->num_b;
        return $this->math_div;
    }
}