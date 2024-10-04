<?php
/**
 * Generate Document
 * Explanation: You're given a string of available characters and a string representing a document that you need to generate.
 * Write a function that determines if you can generate the document using the available characters. If you can generate the document,
 * your function should return true; otherwise, it should return false.
 * You're only able to generate the document if the frequency of unique characters in the characters string is greater than or equal to
 * the frequency of unique characters in the document string. For example, if you're given characters = "abcabc" and document = "aabbccc"
 * you cannot generate the document because you're missing one c.
 * The document that you need to create may contain any characters, including special characters, capital letters, numbers, and spaces.
 * Note: you can always generate the empty string ("").
 * Example: characters = "Bste!hetsi ogEAxpelrt x ", document = "AlgoExpert is the Best!"
 * Output: true
 * Example: characters = "abc", document = "aabbccc"
 * Output: false
 */

$characters = "Bste!hetsi ogEAxpelrt x ";
$document = "AlgoExpert is the Best!";

function generateDocument($characters, $document)
{
    $charCount = [];
    for ($i = 0; $i < strlen($characters); $i++){
        $char = $characters[$i];
        if (!array_key_exists($char, $charCount)){
            $charCount[$char] = 0;
        }
        $charCount[$char]++;
    }

    for ($j = 0; $j < strlen($document); $j++){
        $char = $document[$j];
        if (!array_key_exists($char, $charCount) || $charCount[$char] == 0){
            return false;
        }
        $charCount[$char]--;
    }

    return true;
}

print_r(generateDocument($characters, $document));
