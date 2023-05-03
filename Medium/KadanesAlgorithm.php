<?php
/**
 * Kadane's Algorithm
 * Explanation: Write a function that takes in a non-empty array of integers and returns the maximum sum that can be obtained by summing up all of the integers in a non-empty subarray of the input array.
 * A subarray must only contain adjacent numbers (numbers next to each other in the input array).
 * Reference: https://www.youtube.com/watch?v=5WZl3MMT0Eg
 */

function kadanesAlgorithm($array){
    $maxEndingHere = $array[0];
    $maxSoFar = $array[0];

    for($i = 1; $i < count($array); $i++){
        $num = $array[$i];
        $maxEndingHere = max($num, $maxEndingHere + $num);
        $maxSoFar = max($maxSoFar, $maxEndingHere);
    }

    return $maxSoFar;
}

$array = [3, 5, -9, 1, 3, -2, 3, 4, 7, 2, -9, 6, 3, 1, -5, 4];

print_r(kadanesAlgorithm($array)); // 19