<?php
/**
 * Move Element To End
 * Explanation: Given an array of integers and an integer, write a function that moves all instances of that integer in the array to the end of the array.
 * Reference: https://www.youtube.com/watch?v=MWouZIBA9aQ
 */

$array = [2, 1, 2, 2, 2, 3, 4, 2];
$toMove = 2;

function moveElementToEnd($array, $toMove)
{
    $left = 0;
    $right = count($array) - 1;

    while ($left < $right) {
        if ($array[$right] != $toMove) {
            if ($array[$left] == $toMove) {
                [$array[$left], $array[$right]] = [$array[$right], $array[$left]];
            }
            $left++;
        } else {
            $right--;
        }
    }

    return $array;
}


print_r(moveElementToEnd($array, $toMove));