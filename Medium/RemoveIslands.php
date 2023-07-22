<?php
/**
 * Remove Islands
 * You're given a two-dimensional array (a matrix) of potentially unequal height and width containing only 0s and 1s.
 * The matrix represents a two-toned image, where each 1 represents black and each 0 represents white.
 * An island is defined as any number of 1s that are horizontally or vertically adjacent (but not diagonally adjacent) and that don't touch the border of the image.
 * In other words, a group of horizontally or vertically adjacent 1s isn't an island if any of those 1s are in the first row, last row, first column, or last column of the input matrix.
 * Note that an island can twist. In other words, it doesn't have to be a straight vertical line or a straight horizontal line; it can be L-shaped, for example.
 * You can think of islands as patches of black that don't touch the border of the two-toned image.
 * Write a function that returns a modified version of the input matrix, where all of the islands are removed.
 * You remove an island by replacing it with 0s.
 * Naturally, you're allowed to mutate the input matrix.
 *
 * Reference: https://www.youtube.com/watch?v=muncqlKJrH0
 */

function removeIslands($matrix){
    for ($i = 0; $i < count($matrix[0]); $i++) {
        traverseNeighbors(0, $i, $matrix);
        traverseNeighbors(count($matrix) - 1, $i, $matrix);
    }

    for ($j = 0; $j < count($matrix); $j++) {
        traverseNeighbors($j, 0, $matrix);
        traverseNeighbors($j, count($matrix[0]) - 1, $matrix);
    }

    for ($k = 0; $k < count($matrix); $k++) {
        for ($l = 0; $l < count($matrix[0]); $l++) {
            $value = $matrix[$k][$l];
            if ($value == 1){
                $matrix[$k][$l] = 0;
            } else if ($value == 2){
                $matrix[$k][$l] = 1;
            }
        }
    }

    return $matrix;
}

function traverseNeighbors($j, $i, $matrix){
    $current = $matrix[$j][$i];

    if ($current == 1){
        $matrix[$j][$i] = 2;

        if($j + 1 < count($matrix)){
            traverseNeighbors($j + 1, $i, $matrix);
        }

        if($j - 1 >= 0){
            traverseNeighbors($j - 1, $i, $matrix);
        }

        if($i + 1 < count($matrix[0])){
            traverseNeighbors($j, $i + 1, $matrix);
        }

        if($i - 1 >= 0){
            traverseNeighbors($j, $i - 1, $matrix);
        }
    }

}

$matrix = [
    [1, 0, 0, 1, 0],
    [0, 0, 1, 0, 1],
    [0, 0, 0, 1, 0],
    [1, 0, 1, 0, 1],
    [0, 1, 0, 0, 1]
];

print_r(removeIslands($matrix));