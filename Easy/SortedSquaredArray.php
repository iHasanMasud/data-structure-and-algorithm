<?php
/**
 * Sorted Squared Array
 * Author: https://github.com/iHasanMasud
 */

function sortedSquaredArray($array){
    $sortedSquares = [];
    $left = 0;
    $right = count($array) - 1;
    for ($i = $right; $i >= 0; $i--) {
        $startSquared = $array[$left] ** 2;
        $endSquared = $array[$right] ** 2;
        // Not using abs() function to avoid extra function call, as square of a negative number is always positive
        if ($startSquared > $endSquared) {
            $sortedSquares[$i] = $startSquared * $startSquared;
            $left++;
        } else {
            $sortedSquares[$i] = $endSquared * $endSquared;
            $right--;
        }
    }
    return $sortedSquares;
}

print_r(sortedSquaredArray([-7, -3, -1, 4, 8, 12]));