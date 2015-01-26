<?php
require_once 'Base.php';

class AlgoritmicPleasureTest extends PHPUnit_Framework_TestCase
{
    public function testSumNaturalNumbers()
    {
        $alg = new TryCatch\Starter\Algorithms();
        $this->assertEquals(23,$alg->sumNaturalNumbers(array(3,5),10));
        $this->assertEquals(18,$alg->sumNaturalNumbers(array(3),10));
        $this->assertEquals(5,$alg->sumNaturalNumbers(array(5),10));
        $this->assertEquals(233168,$alg->sumNaturalNumbers(array(3,5),1000));
        $this->assertEquals(12,$alg->sumNaturalNumbers(array(4),10));
        $this->assertEquals(30,$alg->sumNaturalNumbers(array(3,4),10));
        $this->assertEquals(249501,$alg->sumNaturalNumbers(array(3,4),1000));
    }

    public function testPowerNumbers()
    {
        $alg = new TryCatch\Starter\Algorithms();
        $this->assertEquals(4,$alg->powerNumber(2,2));
        $this->assertEquals(0,$alg->powerNumber(0,0));
        $this->assertEquals(1,$alg->powerNumber(1,0));
        $this->assertEquals(4,$alg->powerNumberPhp(2,2));
        // $this->assertEquals(4,$alg->powerNumberPhp6(2,2));
    }

    public function testFibonacci()
    {
        $alg = new TryCatch\Starter\Algorithms();
        $this->assertEquals(array(0),$alg->fibonacci(0));
        $this->assertEquals(array(0,1),$alg->fibonacci(1));
        $this->assertEquals(array(0,1,1),$alg->fibonacci(2));
        $this->assertEquals(array(0,1,1,2),$alg->fibonacci(3));
        $this->assertEquals(array(0,1,1,2,3),$alg->fibonacci(4));
        $this->assertEquals(array(0,1,1,2,3,5,8,13,21,34,55),$alg->fibonacci(10));

        $this->assertEquals(array(0),$alg->fibonacciWithRecursion(0));
        $this->assertEquals(array(0,1),$alg->fibonacciWithRecursion(1));
        $this->assertEquals(array(0,1,1),$alg->fibonacciWithRecursion(2));
        $this->assertEquals(array(0,1,1,2),$alg->fibonacciWithRecursion(3));
        $this->assertEquals(array(0,1,1,2,3),$alg->fibonacciWithRecursion(4));
        $this->assertEquals(array(0,1,1,2,3,5,8,13,21,34,55),$alg->fibonacciWithRecursion(10));

        $this->assertEquals(array(0),$alg->fibonacciWithoutRecursion(0));
        $this->assertEquals(array(0,1),$alg->fibonacciWithoutRecursion(1));
        $this->assertEquals(array(0,1,1),$alg->fibonacciWithoutRecursion(2));
        $this->assertEquals(array(0,1,1,2),$alg->fibonacciWithoutRecursion(3));
        $this->assertEquals(array(0,1,1,2,3),$alg->fibonacciWithoutRecursion(4));
        $this->assertEquals(array(0,1,1,2,3,5,8,13,21,34,55),$alg->fibonacciWithoutRecursion(10));
    }
}