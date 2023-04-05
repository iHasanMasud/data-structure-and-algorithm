<?php

/**
 * Semordnilap
 * Explanation: A semordnilap is a word or phrase that spells a different word or phrase backwards.
 * Example: "semordnilap" => "palindromes"
 */

$words = ["semordnilap", "palindromes", "dog", "cat", "desserts", "stressed"];
function semordnilap($string){
    $seenWords = [];
    $semordnilaps = [];

    foreach ($string as $word) {
        $reversedWord = strrev($word);
        if (in_array($reversedWord, $seenWords)) {
            $semordnilaps[] = [$word, $reversedWord];
        }else{
            $seenWords[] = $word;
        }
    }

    return $semordnilaps;
}

print_r(semordnilap($words));