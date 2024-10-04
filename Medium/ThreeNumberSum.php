<?php
/**
 * Three Number Sum
 * Explanation: Given an array of integers and a target sum, find all triplets in the array that sum up to the target sum.
 * Reference: https://www.youtube.com/watch?v=jzZsG8n2R9A
 */

$array = [12, 3, 1, 2, -6, 5, -8, 6];
$targetSum = 10;

function threeNumberSum($array, $targetSum)
{
    $triplets = [];
    sort($array);

    for ($i = 0; $i < count($array) - 2; $i++){
        $left = $i + 1;
        $right = count($array) - 1;

        while ($left < $right){
            $currentSum = $array[$i] + $array[$left] + $array[$right];
            if ($currentSum == $targetSum){
                $triplets [] = [$array[$i], $array[$left], $array[$right]];
                $left++;
                $right--;
            }elseif ($currentSum < $targetSum){
                $left++;
            }elseif ($currentSum > $targetSum){
                $right--;
            }
        }
    }

    return $triplets;
}

print_r(threeNumberSum($array, $targetSum));


