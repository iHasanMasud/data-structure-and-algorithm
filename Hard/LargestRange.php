<?php

/**
 * Largest Range
 *
 * Write a function that takes in an array of integers and returns an array of length 2 representing the largest range of integers contained in that array.
 *
 * The first number in the output array should be the first number in the range while the second number should be the last number in the range.
 *
 * A range of numbers is defined as a set of numbers that come right after each other in the set of real integers.
 * For instance, the output array [2, 6] represents the range {2,3,4,5,6}, which is a range of length 5. Note that,
 * numbers don't need to be sorted or adjacent in the input array in order to form a range.
 * You can assume that there will only be one largest range.
 *
 * Reference: https://www.youtube.com/watch?v=ksXSDgQjL0I
 */

function largestRange($array) {
    $numbers = [];
    $min = $array[0];
    $max = $array[0];

    foreach ($array as $a) {
        $numbers[$a] = true;
        $min = min($min, $a);
        $max = max($max, $a);
    }

    $ranges = [];
    $prevCount = 0;
    $currentCount = 0;

    for ($i = $min; $i <= $max + 1; $i++) {
        if (isset($numbers[$i])) {
            $currentCount++;
        } else {
            if ($prevCount < $currentCount) {
                $prevCount = $currentCount;
                $ranges = [$min, $i - 1];
            }
            $currentCount = 0;
            $min = $i + 1;
        }
    }

    return $ranges;
}


$array = [1, 11, 3, 0, 15, 5, 2, 4, 10, 7, 12, 6];
print_r(largestRange($array)); // [0, 7]
