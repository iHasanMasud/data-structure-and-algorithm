<?php

/**
 * Longest Subarray With Sum
 *
 * Write a function that takes in a non-empty array of integers and non-negative integer representing a target sum.
 * The function should find the longest subarray in the input array that sums up to the target sum and return an array
 * containing the starting and ending indices of that subarray.
 *
 * If there is no such subarray, return empty array.
 *
 * Refer: https://www.youtube.com/watch?v=frf7qxiN2qU
 */

function longestSubarrayWithSum(array $array, int $targetSum): array
{
    $sum = 0;
    $map = [0 => -1];
    $start = 0;
    $end = 0;
    $max = 0;

    for ($i = 0; $i < count($array); $i++) {
        $sum += $array[$i];

        if (isset($map[$sum - $targetSum])) {
            $start = $map[$sum - $targetSum] + 1;
            $end = $i;
            $max = max($max, $end - $start + 1);
        }

        $map[$sum] = $i;
    }

    return $max > 0 ? [$start, $end] : [];
}

$array = [1, 2, 3, 4, 3, 3, 1, 2, 1, 2];

print_r(longestSubarrayWithSum($array, 10));

