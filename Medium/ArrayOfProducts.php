<?php
/**
 * Array of Products
 * Explanation: Given an array of integers, return a new array such that each element at index i of the new array is the product of all the numbers in the original array except the one at i.
 * Reference: https://www.youtube.com/watch?v=tSRFtR3pv74
 * Example: [1, 2, 3, 4, 5] => [120, 60, 40, 30, 24]
 */

$array = [1, 2, 3, 4, 5];

function arrayOfProducts($array) {
    $products = array_fill(0, count($array), 1);

    $leftRunningProduct = 1;
    for($i = 0; $i < count($array); $i++){
        $products[$i] = $leftRunningProduct;
        $leftRunningProduct *= $array[$i];
    }

    $rightRunningProduct = 1;
    for ($i = count($array) - 1; $i >= 0; $i--){
        $products[$i] *=$rightRunningProduct;
        $rightRunningProduct *= $array[$i];
    }

    return $products;
}

print_r(arrayOfProducts($array));