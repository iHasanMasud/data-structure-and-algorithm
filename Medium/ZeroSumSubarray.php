<?php
/**
 * Zero Sum Subarray
 * Explanation: Given an array of integers, check if it contains a subarray having 0 sum.
 * Reference: https://www.youtube.com/watch?v=rpZfxmHTvJc | Brute Force
 */

$array = [4, 2, -3, 1, 6];

function zeroSumSubarray(array $array)
{
    $prefixSum = 0;
    $prefixSumArray = [];
    for ($i = 0; $i < count($array); $i++) {
        $prefixSum += $array[$i];
        if ($prefixSum === 0 || in_array($prefixSum, $prefixSumArray)) {
            return true;
        }
        $prefixSumArray[] = $prefixSum;
    }

    return false;
}

print_r(zeroSumSubarray($array));