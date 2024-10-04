<?php
/**
 * Missing Numbers
 * Explanations: You're given an array of integers. Write a function that returns an array of all the missing numbers between the smallest and largest numbers in the array.
 * Reference: https://www.youtube.com/watch?v=WnPLSRLSANE
 */

$array = [1, 2, 3, 5, 6, 7, 10, 11, 12, 15, 16, 17, 18, 19, 20];
function findMissingNumbers($array){
    $array[] = 1;
    $array[] = 1;
    for ($i = 0; $i < count($array) - 2; $i++) {
        $num = abs($array[$i]);
        $array[$num - 1] = -abs($array[$num - 1]);
    }

    $solution = [];
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > 0) {
            $solution[] = $i + 1;
        }
    }
    return $solution;
}

print_r(findMissingNumbers($array));