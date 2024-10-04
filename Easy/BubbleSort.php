<?php

/**
 * Bubble Sort
 * Explanation: https://www.youtube.com/watch?v=6Gv8vg0kcHc
 * Time Complexity: O(n^2)
 * Space Complexity: O(1)
 */
function bubbleSort($arr)
{
    $isSorted = false;
    $lastUnsorted = count($arr) - 1;
    while (!$isSorted){
        $isSorted = true;
        for ($i = 0; $i < $lastUnsorted; $i++){
            if ($arr[$i] > $arr[$i + 1]){
                [$arr[$i], $arr[$i + 1]] = [$arr[$i + 1], $arr[$i]];
                $isSorted = false;
            }
        }
        $lastUnsorted--;
    }
    return $arr;
}

$arr = [8, 5, 2, 9, 5, 6, 3];
print_r(bubbleSort($arr));
