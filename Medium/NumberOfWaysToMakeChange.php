<?php
/**
 * Number of ways to make change
 * Explanation: Given an array of distinct positive integers representing coin denominations and a single non-negative integer n representing a target amount of money, write a function that returns the number of ways to make change for that target amount using the given coin denominations.
 * Note that an unlimited amount of coins is at your disposal.
 * Reference: https://www.youtube.com/watch?v=DJ4a7cmjZY0
 */

/**
 * @param $n
 * @param $denoms
 * @return int
 */
function numberOfWaysToMakeChange($n, $denoms): int
{
    $ways = [1, ...array_fill(1, $n, 0)];

    foreach ($denoms as $denom) {
        for ($change = $denom; $change <= $n; $change++) {
            $ways[$change] += $ways[$change - $denom];
        }
    }

    return $ways[$n];
}

$arr = [1, 5, 10, 25];
$target = 10;
print_r(numberOfWaysToMakeChange($target, $arr)); // 4
