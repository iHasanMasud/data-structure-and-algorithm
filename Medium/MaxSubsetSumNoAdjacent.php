<?php
/**
 * Max Subset Sum No Adjacent
 * Explanation: Write a function that takes in an array of positive integers and returns the maximum sum of non-adjacent elements in the array.
 * If the input array is empty, the function should return 0.
 * Reference: https://www.youtube.com/watch?v=UtGtF6nc35g
 */

function maxSubsetSumNoAdjacent(array $array): int {
    $previous = 0;
    $current = 0;

    for($i = 0; $i < count($array); $i++) {
        $temp = $current;
        if ($array[$i] + $previous > $current) {
            $current = $array[$i] + $previous;
        }
        $previous = $temp;
    }
    return $current;
}

$array = [75, 105, 120, 75, 90, 135];

print_r(maxSubsetSumNoAdjacent($array)); // 330
