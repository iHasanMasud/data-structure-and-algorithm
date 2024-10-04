<?php
/**
 * Longest Peak
 * Explanation: Given an array of integers, return the length of the longest peak. A peak is defined as adjacent integers in the array that are strictly increasing until they reach a tip (the highest value in the peak), at which point they become strictly decreasing. At least three integers are required to form a peak.
 * Reference: https://www.youtube.com/watch?v=rh2Bkul2zzQ
 */

$array = [1, 2, 3, 3, 4, 0, 10, 6, 5, -1, -3, 2, 3];

function longestPeak($array)
{
    $longestPeakLength = 0;
    $i = 1;

    while ($i < count($array) - 1) {
        $isPeak = $array[$i - 1] < $array[$i] && $array[$i + 1] < $array[$i];

        if (!$isPeak) {
            $i++;
            continue;
        }

        $leftIdx = $i - 2;

        while ($leftIdx >= 0 && $array[$leftIdx] < $array[$leftIdx + 1]) {
            $leftIdx--;
        }

        $rightIdx = $i + 2;

        while ($rightIdx < count($array) && $array[$rightIdx] < $array[$rightIdx - 1]) {
            $rightIdx++;
        }

        $currentPeakLength = $rightIdx - $leftIdx - 1;

        if ($currentPeakLength > $longestPeakLength) {
            $longestPeakLength = $currentPeakLength;
        }

        $i = $rightIdx;
    }

    return $longestPeakLength;
}

print_r(longestPeak($array));