<?php
/**
 * Staircase Traversal
 *
 * You're given two positive integers representing the height of a staircase and the maximum number of steps that
 * you can advance up the staircase at a time. Write a function that returns the number of ways in which you can
 * climb the staircase.
 *
 * For example, if you were given a staircase of height = 3 and maxSteps = 2 you could climb the staircase in 3 ways.
 * You could take 1 step, 1 step, then 1 step, you could also take 1 step, then 2 steps, and you could take 2 steps,
 * then 1 step.
 *
 * Note that maxSteps <= height will always be true.
 *
 * Sample Input:
 * height = 4
 * maxSteps = 2
 *
 * Sample Output:
 * 5
 *
 * Reference: https://www.youtube.com/watch?v=Y0lT9Fck7qI
 */

function staircaseTraversal($height, $maxSteps)
{
    $memoize = [];
    return numberOfWaysToTop($height, $maxSteps, $memoize);
}

function numberOfWaysToTop($height, $maxSteps, &$memoize)
{
    if ($height <= 1) {
        return 1;
    }

    if (isset($memoize[$height])) {
        return $memoize[$height];
    }

    $numberOfWays = 0;
    for ($step = 1; $step < min($maxSteps, $height) + 1; $step++) {
        $numberOfWays += numberOfWaysToTop($height - $step, $maxSteps, $memoize);
    }

    $memoize[$height] = $numberOfWays;
    return $numberOfWays;
}

print_r(staircaseTraversal(4, 2)); // 5