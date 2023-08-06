<?php

/**
 * Balanced Brackets
 *
 * Write a function that takes in a string made up of brackets ( (, [, {, ), ], and }) and other optional characters.
 * The function should return a boolean representing whether the string is balanced with regards to brackets.
 * A string is said to be balanced if it has as many opening brackets of a certain type as it has closing brackets of that type
 * and if no bracket is unmatched. Note that an opening bracket can't match a corresponding closing bracket that comes before it,
 * and similarly, a closing bracket can't match a corresponding opening bracket that comes after it.
 * Also, brackets can't overlap each other as in [(]).
 *
 * Reference: https://www.youtube.com/watch?v=WTzjTskDFMg
 */

function balancedBrackets($string)
{
    $openingBrackets = '([{';
    $closingBrackets = ')]}';
    $matchingBrackets = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];
    $stack = [];

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if (str_contains($openingBrackets, $char)) {
            $stack[] = $char;
        } else if (str_contains($closingBrackets, $char)) {
            if (empty($stack)) {
                return false;
            }

            if (end($stack) == $matchingBrackets[$char]) {
                array_pop($stack);
            } else {
                return false;
            }
        }
    }

    return empty($stack);
}

$string = '([])(){}(())()()';
print_r(balancedBrackets($string));