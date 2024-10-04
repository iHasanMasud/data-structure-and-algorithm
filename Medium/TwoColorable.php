<?php

/**
 * Two Colorable
 * You are given a list of edges representing an undirected graph. Write a function that determines whether the graph
 * can be colored with two colors such that no two adjacent nodes of the same color.
 *
 * Reference: https://www.youtube.com/watch?v=0ACfAqs8mm0
 * Reference: https://www.youtube.com/watch?v=bZBmN7I7GNQ&pp
 */

function twoColorable($edges)
{
    $colorObj = [];
    $black = 0;
    $white = 1;

    for ($i = 0; $i < count($edges); $i++) {
        $node = $i;

        for ($j = 0; $j < count($edges[$i]); $j++) {
            $connectedNodes = $edges[$i][$j];

            if ($node == $connectedNodes) {
                return false;
            }

            if (!isset($colorObj[$connectedNodes]) && !isset($colorObj[$node])) {
                $colorObj[$node] = $black;
            } elseif (!isset($colorObj[$connectedNodes])) {
                $colorObj[$connectedNodes] = 1 - $colorObj[$node];
            } elseif (!isset($colorObj[$node])) {
                $colorObj[$node] = 1 - $colorObj[$connectedNodes];
            } elseif ($colorObj[$node] == $colorObj[$connectedNodes]) {
                return false;
            }
        }
    }

    return true;
}


$edges = [
    [1, 2],
    [0, 2],
    [0, 1]
];

print_r(twoColorable($edges));
