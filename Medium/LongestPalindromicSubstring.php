<?php

/**
 * Longest Palindromic Substring
 *
 * Write a function that, given a string, returns its longest palindromic substring.
 *
 * A palindrome is defined as a string that's written the same forward and backward. Note that single-character strings are palindromes.
 * You can assume that there will only be one longest palindromic substring.
 *
 * Reference: https://www.youtube.com/watch?v=XYQecbcd6_c
 */

function longestPalindromicSubstring($string) {
    $currentLongest = [0, 1];
    for ($i = 1; $i < strlen($string); $i++) {
        $odd = getLongestPalindromeFrom($string, $i - 1, $i + 1);
        $even = getLongestPalindromeFrom($string, $i - 1, $i);
        $longest = $odd[1] - $odd[0] > $even[1] - $even[0] ? $odd : $even;
        $currentLongest = $currentLongest[1] - $currentLongest[0] > $longest[1] - $longest[0] ? $currentLongest : $longest;
    }
    return substr($string, $currentLongest[0], $currentLongest[1] - $currentLongest[0]);
}

function getLongestPalindromeFrom($string, $leftIdx, $rightIdx) {
    while ($leftIdx >= 0 && $rightIdx < strlen($string)) {
        if ($string[$leftIdx] !== $string[$rightIdx]) {
            break;
        }
        $leftIdx--;
        $rightIdx++;
    }
    return [$leftIdx + 1, $rightIdx];
}

$string = "abaxyzzyxf";

echo longestPalindromicSubstring($string); // xyzzyx
