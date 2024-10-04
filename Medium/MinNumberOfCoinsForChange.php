<?php
/**
 * Min Number of Coins For Change
 * Explanation: Given an array of positive integers representing coin denominations and a single non-negative integer n representing a target amount of money, write a function that returns the smallest number of coins needed to make change for (to sum up to) that target amount using the given coin denominations.
 * Note that you have access to an unlimited amount of coins. In other words, if the denominations are [1, 5, 10], you have access to an unlimited amount of 1s, 5s, and 10s.
 * If it's impossible to make change for the target amount, return -1.
 * Reference: https://www.youtube.com/watch?v=J2eoCvk59Rc
 */

function minNumberOfCoinsForChange($n, $denoms)
{
    if ($n == 0) return 0;

    $numOfCoins = array_fill(0, $n + 1, PHP_INT_MAX);

    foreach ($denoms as $denom) {
        for ($amount = $denom; $amount <= $n; $amount++) {
            if ($amount % $denom === 0) {
                $numOfCoins[$amount] = min($numOfCoins[$amount], $amount / $denom);
            }
            $numOfCoins[$amount] = min($numOfCoins[$amount], $numOfCoins[$amount - $denom] + 1);
        }
    }

    return $numOfCoins[$n] !== PHP_INT_MAX ? $numOfCoins[$n] : -1;
}

$arr = [1, 5, 10];
$n = 7;
print_r(minNumberOfCoinsForChange($n, $arr)); // 3