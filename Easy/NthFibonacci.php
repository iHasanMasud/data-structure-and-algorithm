<?php

/**
 * Nth Fibonacci
 * Write a function that takes in an integer n and returns the nth Fibonacci number.
 */

# Solution 1
function nthFibonacci($n){
    if ($n == 1){
        return 0;
    }elseif ($n == 2){
        return 1;
    }else {
        return nthFibonacci($n - 1) + nthFibonacci($n - 2);
    }
}

# Solution 2
function nthFibonacci2($n){
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++){
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib[$n - 1];
}

print_r(nthFibonacci2(8));