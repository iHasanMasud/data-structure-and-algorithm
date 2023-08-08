<?php

/**
 * Best Digits
 *
 * Write a function that takes a positive integer represented as a string number and an integer numDigits.
 * Remove numDigits digits from the string so that the number represented by the string is as large as possible afterward.
 */

function bestDigits($number, $numDigits) {
    $stack = [];

    foreach (str_split($number) as $digit) {
        while (count($stack) > 0 && $numDigits > 0 && end($stack) < $digit) {
            array_pop($stack);
            $numDigits--;
        }
        $stack[] = $digit;
    }

    if ($numDigits > 0){
        array_splice($stack, count($stack) - $numDigits, $numDigits);
    }

    return implode('', $stack);
}

echo bestDigits('87587598', 3); // 4567890