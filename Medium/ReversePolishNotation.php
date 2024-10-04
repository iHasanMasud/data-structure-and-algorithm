<?php

/**
 * Reverse Polish Notation
 *
 * You are given a list of strings tokens representing a valid Reverse Polish Notation expression. Reverse Polish
 * Notation (RPN) is a mathematical notation where operators come after their operands, instead of between them.
 * For example 2 4 + would evaluate to 6, as 2 + 4 = 6.
 *
 * Parentheses are always implicit in reverse polish notation. Meaning an expression is evaluated from left-to-right
 * All the operators for this problem take two operands, which will always be the two values immediately preceding the
 * operator. For example, 18 4 - 7 / would be evaluated to ((18-4)/7) or 2.
 *
 * Reference: https://www.youtube.com/watch?v=iu0082c4HDE
 */

function reversePolishNotation($tokens) {
    $operationsStack = [];
    $operations = [
        '+' => function($a, $b) { return $a + $b; },
        '-' => function($a, $b) { return $a - $b; },
        '*' => function($a, $b) { return $a * $b; },
        '/' => function($a, $b) { return intdiv($a, $b); }
    ];

    foreach ($tokens as $token) {
        if (!is_numeric($token)) {
            $operand2 = array_pop($operationsStack);
            $operand1 = array_pop($operationsStack);
            $operationsStack[] = $operations[$token]($operand1, $operand2);
        } else {
            $operationsStack[] = (float)$token;
        }
    }

    return (float)$operationsStack[0];
}

$array = ["50", "3", "17", "+", "2", "-", "/"];

echo reversePolishNotation($array); // 2