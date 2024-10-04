<?php

/**
 * Power Set
 * Write a function that takes in an array of unique integers and returns its powerset.
 * The powerset P(X) of a set X is the set of all subsets of X. For example, the powerset of [1,2] is [[], [1], [2], [1,2]].
 *
 * Note that the sets in the powerset do not need to be in any particular order.
 *
 * Reference: https://www.youtube.com/watch?v=h4zNvA4lbtc
 */

function powerset($array)
{
    $subSets = [[]];
    foreach ($array as $element) {
        $currentSubSet = [];
        for ($i = 0; $i < count($subSets); $i++) {
            $currentSubSet[] = array_merge($subSets[$i], [$element]);
        }
        $subSets = array_merge($subSets, $currentSubSet);
    }
    return $subSets;
}

$array = [1, 2, 3];

print_r(powerset($array));
