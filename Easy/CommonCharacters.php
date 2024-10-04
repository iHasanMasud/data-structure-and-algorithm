<?php
/**
 * Common Characters
 * Explanation: Write a function that takes in a non-empty list of non-empty strings and returns a list of characters
 * that are common to all strings in the list, ignoring multiplicity.
 * Note that the strings are not guaranteed to only contain alphanumeric characters.
 * The list you return can be in any order
 * Reference: https://www.youtube.com/watch?v=if6F2qiC1ls
 */

$array = ['bella', 'label', 'roller'];

function commonCharacters(array $array): array
{
    $smallestString = getSmallestString($array);
    $potentialCommonCharacters = str_split($smallestString);
    $commonCharacters = [];

    foreach ($potentialCommonCharacters as $potentialCommonCharacter) {
        $isCommonCharacter = true;
        for ($i = 0; $i < count($array); $i++) {
            if (!str_contains($array[$i], $potentialCommonCharacter)) {
                $isCommonCharacter = false;
                break;
            }
        }
        if ($isCommonCharacter && !in_array($potentialCommonCharacter, $commonCharacters)) {
            $commonCharacters[] = $potentialCommonCharacter;
        }
    }

    return $commonCharacters;
}

function getSmallestString(array $array): string
{
    $smallestString = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        if (strlen($array[$i]) < strlen($smallestString)) {
            $smallestString = $array[$i];
        }
    }

    return $smallestString;
}

print_r(commonCharacters($array));
