<?php
namespace TryCatch\Starter;

/**
 * Class SumNaturalNumbers
 *
 * @package Starter
 */
class Algorithms
{
    /**
     * Sums all the given $primeNumbers
     *
     * @param integer $end
     * @param array $primeNumbers
     * @return number
     */
    public function sumNaturalNumbers($primeNumbers,$end = 1000)
    {
        $range = array();
        foreach($primeNumbers as $primeNumber)
        {
            $values = @range($primeNumber,$end-1,$primeNumber);
            if($end-1 < $primeNumber*2)
            {
                $values = array($primeNumber);
            }
            $range = array_unique(array_merge($values,$range),SORT_NUMERIC);
        }
        return array_sum($range);
    }

    /**
     * This method will return the power of a number
     *
     * @param integer $a
     * @param integer $b
     * @return integer
     */
    public function powerNumber($a, $b)
    {
        if($a == 0)
        {
            return 0;
        }
        elseif($b == 0)
        {
            return 1;
        }
        $sum = 0;
        $currentSum = $a;
        for($i = 1; $i < $b; $i++)
        {
            $sum = 0;
            for($j = 1; $j <= $a; $j++)
            {
                $sum += $currentSum;
            }
            $currentSum = $sum;
        }
        return $sum;
    }

    /**
     * This method returns the power of a number using php internal function
     *
     * @param integer $a
     * @param integer $b
     * @return number
     */
    public function powerNumberPhp($a, $b)
    {
        return pow($a, $b);
    }

//    /**
//     * This method uses the php 6 power of a number operator
//     *
//     * @param integer $a
//     * @param integer $b
//     * @return integer
//     */
//    public function powerNumberPhp6($a, $b)
//    {
//        return $a**$b;
//    }

    /**
     * Fibonacci using recursion
     *
     * @return array
     */
    private function fibonacciYieldFunction()
    {
        $i = 0;
        $k = 0;
        yield $k;
        yield ++$k;
        while(true)
        {
            $k = $i + $k;
            $i = $k - $i;
            yield $k;
        }
    }

    /**
     * Returns a list of n fibonacci numbers
     *
     * @param integer $n
     * @return array
     */
    public function fibonacci($n)
    {
        $result = [];
        foreach($this->fibonacciYieldFunction() as $fibonacci)
        {
            $result[] = $fibonacci;
            if(count($result) > $n)
            {
                break;
            }
        }
        return $result;
    }

    /**
     * Fibonacci with recursion
     *
     * @param integer $n
     * @return array
     */
    public function fibonacciWithRecursion($n)
    {
        if ($n<2)
        {
            return range(0, $n);
        }
        $n1 = $this->fibonacciWithRecursion($n-1);
        $n2 = $this->fibonacciWithRecursion($n-2);
        return array_merge($n1, [array_pop($n1)+array_pop($n2)]);
    }

    /**
     * Fibonacci using recursion
     *
     * @param integer $n
     * @return array
     */
    public function fibonacciWithoutRecursion($n)
    {
        if ($n<2)
        {
            return range(0, $n);
        }
        $res = array(0, 1, 1);
        while (($a = sizeof($res)) < ($n+1))
        {
            $res[] = $res[$a-1] + $res[$a-2];
        }
        return $res;
    }
}