<?php

/**
 * Insertion Sort
 * Explanation: https://www.youtube.com/watch?v=OGzPmgsI-pQ
 * Time Complexity: O(n^2)
 * Space Complexity: O(1)
 */

$arr = [8, 5, 2, 9, 5, 6, 3];
function insertionSort($arr)
{
    for ($i = 1; $i < count($arr); $i++) {
        $j = $i;
        while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
            [$arr[$j], $arr[$j - 1]] = [$arr[$j - 1], $arr[$j]];
            $j--;
        }
    }

    return $arr;
}

print_r(insertionSort($arr));

