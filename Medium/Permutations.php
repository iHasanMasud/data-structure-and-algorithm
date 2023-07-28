<?php

/**
 * Permutations
 * Write a function that takes in an array of unique integers and returns an array of all permutations of those integers in no particular order.
 * If the input array is empty, the function should return an empty array.
 *
 * Reference: https://www.youtube.com/watch?v=s7AvT7cGdSo
 */

function getPermutations($array) {
    if (count($array) === 1) {
        return [$array]; // Base case: return single-element array
    }

    $permutations = [];

    for ($i = 0; $i < count($array); $i++) {
        $subArray = array_merge(array_slice($array, 0, $i), array_slice($array, $i + 1));
        $subPerm = getPermutations($subArray);

        for ($j = 0; $j < count($subPerm); $j++) {
            $permutations[] = array_merge([$array[$i]], $subPerm[$j]);
        }
    }

    return $permutations;
}


$array = [1, 2, 3];

print_r(getPermutations($array));