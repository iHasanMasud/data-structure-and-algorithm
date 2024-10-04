<?php
/**
 * Merge Overlapping Intervals
 * Explanation: Given a set of time intervals in any order, merge all overlapping intervals into one and output the result which should have only mutually exclusive intervals.
 * Reference: https://www.youtube.com/watch?v=44H3cEC2fFM
 * Time Complexity: O(nlogn)
 * Space Complexity: O(n)
 */

$array = [[1, 3], [2, 4], [5, 7], [6, 8]];

function mergeOverlappingIntervals(array $array)
{
    # Sort the array by the first element of each sub-array
    usort($array, function ($a, $b) {
        return $a[0] <=> $b[0];
    });

    $merged = [];
    $currentInterval = $array[0];

    foreach ($array as $index => $item) {
        $currentIntervalEnd = $currentInterval[1];
        $nextIntervalStart = $item[0];
        $nextIntervalEnd = $item[1];

        if ($currentIntervalEnd >= $nextIntervalStart) { # Overlapping E.g. [1, 3] and [2, 4]
            $currentInterval[1] = max($currentIntervalEnd, $nextIntervalEnd);
        } else {
            $merged[] = $currentInterval;
            $currentInterval = $item;
        }
    }
    $merged[] = $currentInterval;
    return $merged;
}

print_r(mergeOverlappingIntervals($array));