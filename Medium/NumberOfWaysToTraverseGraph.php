<?php
/**
 * Number of ways to traverse graph
 * Explanation: You're given two positive integers representing the width and height of a grid-shaped, rectangular graph.
 * Write a function that returns the number of ways to reach the bottom right corner of the graph when starting at the top left corner.
 * Each move you take must either go down or right. In other words, you can never move up or left in the graph.
 * For example, given the graph illustrated below, with width = 2 and height = 3, there are three ways to reach the bottom right corner when starting at the top left corner:
 * You may simply go right every step of the way, you may go down and then right, or you may first go right and then down.
 * Note: you may assume that width * height >= 2. In other words, the graph will never be a 1x1 grid.
 * Sample Input: width = 4, height = 3
 * Sample Output: 10
 * Reference: https://www.youtube.com/watch?v=rBAxUTqvlQA
 */

function numberOfWaysToTraverseGraph($width, $height){
    $xDistanceToCorner = $width - 1;
    $yDistanceToCorner = $height - 1;

    $numerator = factorial($xDistanceToCorner + $yDistanceToCorner);
    $denominator = factorial($xDistanceToCorner) * factorial($yDistanceToCorner);

    return floor($numerator / $denominator);
}

function factorial($num){
    $result = 1;
    for($i = 2; $i < $num + 1; $i++){
        $result *= $i;
    }
    return $result;
}

print_r(numberOfWaysToTraverseGraph(4, 3)); // 10