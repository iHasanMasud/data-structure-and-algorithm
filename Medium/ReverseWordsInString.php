<?php

/**
 * Reverse Words in a String
 *
 * Write a function that takes in a string of words separated by one or more whitespaces and returns a string that has
 * these words in reverse order. For example, given the string "tim is great" , your function should return "great is tim".
 * For this problem, a word can contain special characters, punctuation, and numbers. The words in the string will be
 * separated by one or more whitespaces, and the reversed string must contain the same whitespaces as the original string.
 * For example, given the string "whitespaces    4" you would be expected to return "4    whitespaces". Note that you're
 * not allowed to to use any built-in split or reverse methods/functions. However, you are allowed to use a built-in
 * join method/function. Also note that the input string isn't guaranteed to always contain words.
 *
 * Reference: https://www.youtube.com/watch?v=_d0T_2Lk2qA
 */

function reverseWordsInString($string){
    $reverse = "";
    $i = strlen($string) - 1;
    $currentWord = "";

    while ($i >= 0){
        $char = $string[$i];
        if ($char == " "){
            $reverse .= $currentWord . $char;
            $currentWord = "";
        } else {
            $currentWord = $char . $currentWord;
        }
        $i--;
    }

    return $reverse . $currentWord;
}

$string = "AlgoExpert is the best!";
echo reverseWordsInString($string); // best! the is AlgoExpert
