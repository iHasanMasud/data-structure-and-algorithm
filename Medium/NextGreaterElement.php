<?php

/**
 * Next Greater Element
 *
 * Write a function that takes in an array of integers and returns a new array containing, at each index, the next element in the input array that's greater than the element at that index in the input array.
 *
 * In other words, your function should return a new array where outputArray[i] is the next element in the input array
 * that's greater than inputArray[i]. If there's no such next greater element for a particular index, the value at that
 * index in the output array should be -1. For example, given array = [1, 2], your function should return [2, -1],
 * given array = [4, 5, 2, 25], your function should return [5, 25, 25, -1].
 *
 * Additionally, your function should treat the input array as a circular array. A circular array wraps around itself
 * as if it were connected end-to-end. So the next index after the last index in a circular array is the first index.
 * This means that, for our problem, given array = [0, 0, 5, 0, 0, 3, 0 0], your function should return [5, 5, -1, 5, 5, -1, 5, 5].
 *
 * Reference: https://www.youtube.com/watch?v=68a1Dc_qVq4
 */

function nextGreaterElement(array $array): array
{
    $result = array_fill(0, count($array), -1);
    $stack = [];

    for ($i = 0; $i < 2 * count($array); $i++) {
        $circularIndex = $i % count($array);

        while (count($stack) > 0 && $array[end($stack)] < $array[$circularIndex]) {
            $top = array_pop($stack);
            $result[$top] = $array[$circularIndex];
        }

        $stack[] = $circularIndex;
    }

    return $result;
}

$array = [2, 5, -3, -4, 6, 7, 2];

print_r(nextGreaterElement($array));