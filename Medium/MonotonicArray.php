<?php

/**
 * Monotonic Array
 * Explanation: An array is monotonic if it is either monotone increasing or monotone decreasing.
 * Reference: https://www.youtube.com/watch?v=eZPwlEWMMtM
 */

function isMonotonic($array) {
    $isNonDecreasing = true;
    $isNonIncreasing = true;

    for ($i = 1; $i < count($array); $i++){
        if ($array[$i] < $array[$i - 1]){
            $isNonDecreasing = false;
        }
        if ($array[$i] > $array[$i - 1]){
            $isNonIncreasing = false;
        }
    }

    return $isNonDecreasing || $isNonIncreasing;
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

print_r(isMonotonic($array));