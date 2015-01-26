<?php
include 'Base.php';

$alg = new TryCatch\Starter\Algorithms();
echo implode(', ',$alg->fibonacciWithoutRecursion(10));