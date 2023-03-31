<?php
/**
 * Product Sum
 * Write a function that takes in a "special" array and returns its product sum.
 * A "special" array is a non-empty array that contains either integers or other "special" arrays.
 * Example: [x, y] where x is an integer and y is another "special" array.
 */

function productSum($array, $multiplier = 1){
    $sum = 0;
    foreach ($array as $element){
        if (is_array($element)){
            $sum += productSum($element, $multiplier + 1);
        }else {
            $sum += $element;
        }
    }
    return $sum * $multiplier;
}

$array = [5, 2, [7, -1], 3, [6, [-13, 8], 4]];

print_r(productSum($array));