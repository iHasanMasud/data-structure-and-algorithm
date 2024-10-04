<?php

/**
 * Binary Search
 */

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

# Solution 1 - Recursive with Helper Function
function binarySearch($arr, $x) {
    return binarySearchHelper($arr, $x, 0, count($arr) - 1);
}

function binarySearchHelper($arr, $x, $start, $end) {
    if ($start > $end) {
        return -1;
    }

    $mid = floor(($start + $end) / 2);

    if ($arr[$mid] == $x) {
        return $mid;
    } elseif ($arr[$mid] > $x) {
        return binarySearchHelper($arr, $x, $start, $mid - 1);
    } else {
        return binarySearchHelper($arr, $x, $mid + 1, $end);
    }
}

# Solution 2 - While Loop with Helper Function
function binarySearch2($arr, $x) {
    return binarySearchHelper2($arr, $x, 0, count($arr) - 1);
}

function binarySearchHelper2($arr, $target, $start, $end){
    while ($start <= $end){
        $mid = floor(($start + $end) / 2);

        if($arr[$mid] == $target){
            return $mid;
        } elseif($arr[$mid] > $target){
            $end = $mid - 1;
        } else {
            $start = $mid + 1;
        }
    }

    return -1;
}

print_r(binarySearch($arr, 5));
