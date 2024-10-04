<?php
/**
 * Palindrome Checker
 * Explanation: https://www.youtube.com/watch?v=XdMau9kwUvU
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 */

$str = 'racecar';
function isPalindrome($str)
{
    $leftPointer = 0;
    $rightPointer = strlen($str) - 1;

    while ($leftPointer < $rightPointer) {
        if ($str[$leftPointer] !== $str[$rightPointer]) {
            return false;
        }
        $leftPointer++;
        $rightPointer--;
    }
    return true;
}

print_r(isPalindrome($str));
