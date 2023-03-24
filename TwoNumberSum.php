<?php
/**
 * Two Number Sum
 * Author: https://github.com/iHasanMasud
 */
function twoNumberSum($array, $targetSum)
{
    // Write your code here
    $seen = [];
    foreach ($array as $item) {
        $diff = $targetSum - $item;
        if (in_array($diff, $seen)) {
            return [$diff, $item];
        }
        $seen[] = $item;
    }
    return [];
}

print_r(twoNumberSum([3, 5, -4, 8, 11, 1, -1, 6], 10));