<?php

/**
 * Single Cycle Check
 * You're given an array of integers where each integer represents a jump of its value in the array. For instance, the
 * integer 2 represents a jump of two indices forward in the array; the integer -3 represents a jump of three indices
 * backward in the array.
 * If a jump spills past the array's bounds, it wraps over to the other side. For instance, a jump of -1 at index 0
 * brings us to the last index in the array. Similarly, a jump of 1 at the last index in the array brings us to index 0.
 *
 * Write a function that returns a boolean representing whether the jumps in the array form a single cycle. A single
 * cycle occurs if, starting at any index in the array and following the jumps, every element in the array is visited
 * exactly once before landing back on the starting index.
 *
 */
function hasSingleCycle($array)
{
    $p = 0;
    while ($array[$p] != null) {
        $index = $p;
        $p = nextPosition($p, $array);
        $array[$index] = null;
    }

    return $p == 0 && !in_array(null, $array);
}

function nextPosition($p, $array)
{
    $nextPos = ($p + $array[$p]) % count($array);
    return $nextPos >= 0 ? $nextPos : $nextPos + count($array);
}

$array = [2, 3, 1, -4, -4, 2];

print_r(hasSingleCycle($array));
