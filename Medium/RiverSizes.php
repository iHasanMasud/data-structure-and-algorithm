<?php
/**
 * River Sizes
 * You're given a two-dimensional array (a matrix) of potentially unequal height and width containing only 0s and 1s.
 * Each 0 represents land, and each 1 represents part of a river. A river consists of any number of 1s that are either
 * horizontally or vertically adjacent (but not diagonally adjacent). The number of adjacent 1s forming a river determine
 * its size. Write a function that returns an array of the sizes of all rivers represented in the input matrix. Note that
 * these sizes do not need to be in any particular order.
 *
 * Reference: https://www.youtube.com/watch?v=b0AgeE6alds
 */

function riverSizes($matrix){
    $sizes = [];

    for ($i = 0; $i < count($matrix); $i++){
        $row = $matrix[$i];
        for ($j = 0; $j < count($row); $j++){
            $cell = $row[$j];
            if ($cell == 1){
                $initialSize = 0;
                $sizes[] = getRiverSize($i, $j, $matrix, $initialSize);
            }
        }
    }

    return $sizes;
}

function getRiverSize($i, $j, $matrix, $size){
    $size++;
    $matrix[$i][$j] = 0;

    // Look right
    if($matrix[$i][$j+1]){
        $size = getRiverSize($i, $j+1, $matrix, $size);
    }

    // Look left
    if($matrix[$i][$j-1]){
        $size = getRiverSize($i, $j-1, $matrix, $size);
    }

    // Look up
    if($matrix[$i-1] && $matrix[$i-1][$j]){
        $size = getRiverSize($i-1, $j, $matrix, $size);
    }

    // Look down
    if($matrix[$i+1] && $matrix[$i+1][$j]){
        $size = getRiverSize($i+1, $j, $matrix, $size);
    }

    return $size;
}


$matrix = [
    [1,0,0,1,0],
    [1,0,1,0,0],
    [0,0,1,0,1],
    [1,0,1,0,1],
    [1,0,1,1,0]
];

print_r(riverSizes($matrix));