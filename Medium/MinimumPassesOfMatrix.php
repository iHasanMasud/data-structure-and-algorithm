<?php

/**
 * Minimum Passes Of Matrix
 * You're given a two-dimensional array (a matrix) of potentially unequal height and width containing only 0s and 1s.
 * Each 0 represents land, and each 1 represents part of a river. A river consists of any number of 1s that are either
 * horizontally or vertically adjacent (but not diagonally adjacent). The number of adjacent 1s forming a river determine
 * its size. Write a function that returns an array of the sizes of all rivers represented in the input matrix. Note
 * that these sizes do not need to be in any particular order.
 *
 * Reference: https://www.youtube.com/watch?v=wfVwna1Lqos
 */


function minimumPassesOfMatrix($matrix)
{
    $passes = 0;
    $queue = [];

    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            if ($matrix[$i][$j] > 0) {
                $queue[] = [$i, $j];
            }
        }
    }

    $index = 0;
    $passLength = count($queue);

    while ($index != $passLength) {
        $currentElement = $queue[$index];
        processAdjacentChildren($currentElement, $matrix, $queue);

        if ($index == $passLength - 1) {
            $passLength = count($queue);
            $passes++;
        }
        $index++;
    }

    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            if ($matrix[$i][$j] < 0) {
                return -1;
            }
        }
    }

    return $passes - 1;
}

function processAdjacentChildren($currentElement, $matrix, &$queue)
{
    $i = $currentElement[0];
    $j = $currentElement[1];

    // Top Child
    if ($i != 0 && $matrix[$i - 1][$j] < 0) {
        $queue[] = [$i - 1, $j];
        $matrix[$i - 1][$j] *= -1;
    }

    // Right Child
    if ($j != count($matrix[$i]) - 1 && $matrix[$i][$j + 1] < 0) {
        $queue[] = [$i, $j + 1];
        $matrix[$i][$j + 1] *= -1;
    }

    // Bottom Child
    if ($i != count($matrix) - 1 && $matrix[$i + 1][$j] < 0) {
        $queue[] = [$i + 1, $j];
        $matrix[$i + 1][$j] *= -1;
    }

    // Left Child
    if ($j != 0 && $matrix[$i][$j - 1] < 0) {
        $queue[] = [$i, $j - 1];
        $matrix[$i][$j - 1] *= -1;
    }
}

$matrix = [
    [1, 0, 0, 1, 0],
    [0, 0, 1, 0, 1],
    [0, 0, 0, 1, 0],
    [1, 0, 1, 0, 1],
    [0, 0, 0, 0, 0]
];

print_r(minimumPassesOfMatrix($matrix));