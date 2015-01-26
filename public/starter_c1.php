<?php
include 'Base.php';

$alg = new TryCatch\Starter\Algorithms();
echo implode(', ',$alg->fibonacciWithRecursion(10));