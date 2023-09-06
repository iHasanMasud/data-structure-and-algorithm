<?php
/**
 * Subarray Sort
 *
 * Write a function that takes in an array of at least two integers and that returns an array of the starting and
 * ending indices of the smallest subarray in the input array that needs to be sorted in place in order for the entire
 * input array to be sorted (in ascending order).
 * If the input array is already sorted, the function should return [-1, -1].
 *
 * Reference: https://www.youtube.com/watch?v=7cf5Gj_yoUg
 */

function subarraySort($array){
    $minOutOfOrder = PHP_INT_MAX;
    $maxOutOfOrder = PHP_INT_MIN;

    for($i = 0; $i < count($array); $i++){
        $num = $array[$i];
        if(isOutOfOrder($i, $num, $array)){
            $minOutOfOrder = min($minOutOfOrder, $num);
            $maxOutOfOrder = max($maxOutOfOrder, $num);
        }
    }

    if($minOutOfOrder == PHP_INT_MAX){
        return [-1, -1];
    }

    $subarrayLeftIdx = 0;
    while($minOutOfOrder >= $array[$subarrayLeftIdx]){
        $subarrayLeftIdx++;
    }

    $subarrayRightIdx = count($array) - 1;
    while($maxOutOfOrder <= $array[$subarrayRightIdx]){
        $subarrayRightIdx--;
    }

    return [$subarrayLeftIdx, $subarrayRightIdx];
}

function isOutOfOrder($i, $num, $array){
    if($i == 0){
        return $num > $array[$i + 1];
    }

    if($i == count($array) - 1){
        return $num < $array[$i - 1];
    }

    return $num > $array[$i + 1] || $num < $array[$i - 1];
}

$array = [1, 2, 4, 7, 10, 11, 7, 12, 6, 7, 16, 18, 19];
print_r(subarraySort($array)); // [3, 9]