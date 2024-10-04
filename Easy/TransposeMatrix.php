<?php

/**
 * Transpose Matrix
 * You are given a 2D integer matrix. Write a function that returns the transpose of that matrix.
 *
 * Reference: https://www.geeksforgeeks.org/transpose-matrix-single-line-python/
 * Reference: https://www.youtube.com/watch?v=VDw9y6nX_ss
 */

function transposeMatrix($matrix)
{
    $res = [];

    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            $res[$j][$i] = $matrix[$i][$j];
        }
    }

    return $res;
}


$matrix = [
    [1, 2, 3],
    [4, 5, 6],
];

print_r(transposeMatrix($matrix));