<?php

/**
 * Majority Element
 * Write a function that takes in a non-empty, unordered array of positive integers and returns the array's majority
 * element without sorting the array and without using more than constant space.
 * An array's majority element is an element of the array that appears in over half of its indices.
 * Note that the most common element of an array (the element that appears the most times in the array)
 * isn't necessarily the array's majority element; for example, the arrays [1, 2, 3, 1, 1, 2, 2] and [1, 2, 3, 1, 1, 2, 2, 2]
 * have an equal number of 1s and 2s but the first array's majority element is 3 whereas the second array's majority element is 2.
 *  nor any other element appears in over half of the respective arrays' indices.
 *
 * Reference: https://www.youtube.com/watch?v=7pnhv842keE
 */

function majorityElement(array $array): int
{
    $candidate = null;
    $count = 0;

    foreach ($array as $element) {
        if ($count === 0) {
            $candidate = $element;
        }

        if ($element === $candidate) {
            $count++;
        } else {
            $count--;
        }
    }

    return $candidate;
}

$array = [1, 2, 3, 2, 2, 1, 2];

print_r(majorityElement($array));

