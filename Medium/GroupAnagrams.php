<?php

/**
 * Group Anagrams
 *
 * Write a function that takes in an array of strings and groups anagrams together.
 *
 * Anagrams are strings made up of exactly the same letters, where order doesn't matter. For example, "cinema" and
 * "iceman" are anagrams; similarly, "foo" and "ofo" are anagrams.
 * Your function should return a list of anagram groups in no particular order.
 *
 * Reference: https://www.youtube.com/watch?v=vzdNOK2oB2E
 */

function groupAnagrams($words){
    $anagrams = [];

    foreach ($words as $index => $word) {
        $sortedWord = str_split($word);
        sort($sortedWord);

        $sortedWord = implode('', $sortedWord);

        if (!array_key_exists($sortedWord, $anagrams)) {
            $anagrams[$sortedWord] = [];
        }

        $anagrams[$sortedWord][] = $word;

    }

    return array_values($anagrams);
}

$words = ["yo", "act", "flop", "tac", "foo", "cat", "oy", "olfp"];

print_r(groupAnagrams($words));