<?php
/**
 * Levenshtein Distance
 * Explanation: Write a function that takes in two strings and returns the minimum number of edit operations that need to be performed on the first string to obtain the second string.
 * There are three edit operations: insertion of a character, deletion of a character, and substitution of a character for another.
 * Reference: https://www.youtube.com/watch?v=XYi2-LPrwm4
 */

function levenshteinDistance($str1, $str2){
    $str1 = " " . $str1;
    $str2 = " " . $str2;

    $row = array_fill(0, strlen($str1), 0);
    $table = [];

    for ($i = 0; $i < strlen($str2); $i++) {
        $table[] = $row;
    }

    for ($i = 0; $i < count($row); $i++) {
        $table[0][$i] = $i;
    }

    for ($i = 0; $i < count($table); $i++) {
        $table[$i][0] = $i;
    }

    for ($i = 1; $i < count($table); $i++) {
        for ($j = 1; $j < count($row); $j++) {
            if ($str2[$i] === $str1[$j]) {
                $table[$i][$j] = $table[$i - 1][$j - 1];
            } else {
                $table[$i][$j] = min($table[$i - 1][$j - 1], $table[$i - 1][$j], $table[$i][$j - 1]) + 1;
            }
        }
    }

    return $table[count($table) - 1][count($row) - 1];
}

$str1 = "abc";
$str2 = "yabd";

print_r(levenshteinDistance($str1, $str2)); // 2