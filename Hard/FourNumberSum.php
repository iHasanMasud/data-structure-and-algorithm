<?php
/**
 * Four Number Sum
 *
 * Write a function that takes in a non-empty array of distinct integers and an integer representing a target sum.
 * The function should find all quadruplets in the array that sum up to the target sum and return a two-dimensional
 * array of all these quadruplets in no particular order.
 * If no four numbers sum up to the target sum, the function should return an empty array.
 *
 * Reference: https://www.youtube.com/watch?v=EYeR-_1NRlQ
 */

function fourNumberSum($array, $targetSum)
{
    $quadruplets = [];
    $pairSums = [];
    for ($i = 1; $i < count($array) - 1; $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            $currentSum = $array[$i] + $array[$j];
            $difference = $targetSum - $currentSum;
            if (array_key_exists($difference, $pairSums)) {
                foreach ($pairSums[$difference] as $pairSum) {
                    $quadruplets[] = array_merge($pairSum, [$array[$i], $array[$j]]);
                }
            }
        }
        for ($k = 0; $k < $i; $k++) {
            $currentSum = $array[$i] + $array[$k];
            if (!array_key_exists($currentSum, $pairSums)) {
                $pairSums[$currentSum] = [[$array[$k], $array[$i]]];
            } else {
                $pairSums[$currentSum][] = [$array[$k], $array[$i]];
            }
        }
    }
    return $quadruplets;
}

$array = [7, 6, 4, -1, 1, 2];
$targetSum = 16;

print_r(fourNumberSum($array, $targetSum));