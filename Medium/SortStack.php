<?php

/**
 * Sort Stack
 *
 * Write function that takes in an array of integers representing a stack, recursively sorts the stack in place (i.e., doesn't create a brand new array), and returns it.
 * The array must be treated as a stack, with the end of the array as the top of the stack. Therefore, you're only allowed to
 * Pop elements from the top of the stack by removing elements from the end of the array using the built-in .pop() method in your programming language of choice.
 * Push elements to the top of the stack by appending elements to the end of the array using the built-in .append() method in your programming language of choice.
 * Peek at the element on top of the stack by accessing the last element in the array.
 *
 * You're not allowed to perform any other operations on the input array, including accessing elements (except for the last element), moving elements, etc.. You're also not allowed to use any other data structures, and your solution must be recursive.
 *
 * Reference: https://www.youtube.com/watch?v=XNAv8NrAwng
 */

function sortStack($stack)
{
    if (count($stack) === 0) {
        return $stack;
    }

    $lastElement = array_pop($stack);

    if (count($stack) != 1) {
        $stack = sortStack($stack);
    }

    $currentElement = $stack[count($stack) - 1];

    if ($currentElement > $lastElement) {
        $currentElement = array_pop($stack);
        $stack[] = $lastElement;
        $stack[] = $currentElement;
        $stack = sortStack($stack);
    } else {
        $stack[] = $lastElement;
    }

    return $stack;
}


$stack = [1, 5, 2, 3, 4];
print_r(sortStack($stack)); // [5, 4, 3, 2, 1]
