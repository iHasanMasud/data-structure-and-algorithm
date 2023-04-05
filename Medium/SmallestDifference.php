<?php
/**
 * Smallest Difference
 * Explanation: Given two arrays of integers, compute the pair of values (one value in each array) with the smallest (non-negative) difference.
 * Reference: https://www.youtube.com/watch?v=EyPV7iEr810
 */

$arrayOne = [-1, 5, 10, 20, 28, 3];
$arrayTwo = [26, 134, 135, 15, 17];

function smallestDifference($arrayOne, $arrayTwo)
{
    sort($arrayOne);
    sort($arrayTwo);

    $indexOne = 0;
    $indexTwo = 0;
    $smallest = PHP_INT_MAX;
    $current = PHP_INT_MAX;
    $smallestPair = [];

    while ($indexOne < count($arrayOne) && $indexTwo < count($arrayTwo)){
        $firstNum = $arrayOne[$indexOne];
        $secondNum = $arrayTwo[$indexTwo];

        if ($firstNum < $secondNum){
            $current = $secondNum - $firstNum;
            $indexOne++;
        }elseif ($secondNum < $firstNum){
            $current = $firstNum - $secondNum;
            $indexTwo++;
        }else{
            return [$firstNum, $secondNum];
        }

        if ($smallest > $current){
            $smallest = $current;
            $smallestPair = [$firstNum, $secondNum];
        }
    }

    return $smallestPair;
}

print_r(smallestDifference($arrayOne, $arrayTwo));