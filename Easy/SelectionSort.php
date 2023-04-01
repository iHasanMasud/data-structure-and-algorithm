<?php

/**
 * Selection Sort
 * Explanation: https://www.youtube.com/watch?v=g-PGLbMth_g
 */

$arr = [8, 5, 2, 9, 5, 6, 3];
function selectionSort($arr)
{
    for ($i = 0; $i < count($arr); $i++){
        $currentMin = $i;
        for ($j = $i + 1; $j < count($arr); $j++){
            if($arr[$j] < $arr[$currentMin]){
                $currentMin = $j;
            }
        }
        [$arr[$i], $arr[$currentMin]] = [$arr[$currentMin], $arr[$i]];
    }
    return $arr;
}

print_r(selectionSort($arr));
