<?php

/**
 * Find Three Largest Numbers
 */

$arr = [141, 1, 17, -7, -17, -27, 18, 541, 8, 7, 7];

function findThreeLargestNumbers($arr)
{
    $threeLargest = [-INF, -INF, -INF];

    foreach ($arr as $num) {
        if ($num > $threeLargest[2]) {
            $threeLargest[0] = $threeLargest[1];
            $threeLargest[1] = $threeLargest[2];
            $threeLargest[2] = $num;
        } elseif ($num > $threeLargest[1]) {
            $threeLargest[0] = $threeLargest[1];
            $threeLargest[1] = $num;
        } elseif ($num > $threeLargest[0]) {
            $threeLargest[0] = $num;
        }
    }
    return $threeLargest;
}

print_r(findThreeLargestNumbers($arr));
