<?php
/**
 * First Duplicate Value
 * Explanation: Given an array of integers between 1 and n, inclusive, where n is the length of the array, write a function that returns the first integer that appears more than once (when the array is read from left to right).
 * Reference: https://www.youtube.com/watch?v=9nX2mIFJMpE
 */

function firstDuplicateValue(array $array){
    $seen = [];

    foreach ($array as $index => $item) {
        if (in_array($item, $seen)) {
            return $item;
        }else{
            $seen[] = $item;
        }
    }
    return -1;
}

$array = [2, 1, 5, 2, 3, 3, 4];

print_r(firstDuplicateValue($array));