<?php

/**
 * Minimum Characters For Words
 *
 * Write a function that takes in an array of words and returns the smallest array of characters needed to form
 * all the words. The characters don't need to be in any particular order.
 * For example, the characters ["y", "r", "o", "u"] are needed to form the words ["your", "you", "or", "yo"].
 * Note: the input words won't contain any spaces; however, they might contain punctuation and/or special characters.
 *
 */

function minimumCharactersForWords($words) {
    $minimumCharacters = [];

    foreach ($words as $word) {
        $storage = $minimumCharacters;
        for ($i = 0; $i < strlen($word); $i++) {
            $letter = $word[$i];
            if (!in_array($letter, $storage)) {
                $minimumCharacters[] = $letter;
            } else {
                $index = array_search($letter, $storage);
                array_splice($storage, $index, 1);
            }
        }
    }
    return $minimumCharacters;
}

$words = ["this", "that", "did", "deed", "them!", "a"];

print_r(minimumCharactersForWords($words));
